<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_visitor');

        // Check status visitor
        $status = $this->session->userdata('status');
        if ($status == 'in') {
            $phone = $this->session->userdata('phone');
            $check = $this->m_visitor->is_checkin($phone);
            if (!$check) {
                $this->session->set_userdata('status', 'out');
                $this->session->unset_userdata('public_space_id');
                redirect('visitor');
            }
        }
    }

    // Method for status visitor (checkin/checkout/verify)
    public function index()
    {
        $public_space_id = $this->session->userdata('public_space_id');
        $data['public_space'] = $this->m_visitor->get_user('public_space', 'id', $public_space_id);
        $data['phone'] = $this->session->userdata('phone');
        $data['status'] = $this->session->userdata('status');

        if (!$data['phone']) {
            $this->load->view('404');
        } else {
            $this->load->view('visitor/header');
            $this->load->view('visitor/topbar');
            $this->load->view('visitor/home', $data);
            $this->load->view('visitor/footer');
        }
    }

    // Method for visitors to enter the public space by scanning the QR code
    public function check_in($id)
    {
        $data['public_space'] = $this->m_visitor->get_user('public_space', 'id', $id);

        // If the public space is registered
        if ($data['public_space']) {

            // If the visitor is out of status and the browser still stores the phone number in the session
            if ($this->session->userdata('status') == 'out') {

                $this->session->set_userdata('public_space_id', $data['public_space']['id']);
                $data = [
                    'phone' => $this->session->userdata('phone'),
                    'public_space_id' => $this->session->userdata('public_space_id')
                ];

                $this->m_visitor->insert('record', $data);

                $this->session->set_userdata('status', 'in');

                $this->session->set_flashdata('message', 'checkin-success');
                redirect('visitor');
            } elseif ($this->session->userdata('status') == 'in') {

                // Visitor status is inside, so they can't checkin
                $this->session->set_flashdata('message', 'is-checkin');
                redirect('visitor');
            } else {

                // Visitors enter by scanning the QR code, and the system will show form to input ponsel number
                $this->session->set_userdata('public_space_id', $data['public_space']['id']);
                $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric|min_length[11]');

                if ($this->form_validation->run() == false) {
                    $this->load->view('visitor/header');
                    $this->load->view('visitor/topbar');
                    $this->load->view('visitor/checkin', $data);
                    $this->load->view('visitor/footer');
                } else {

                    // After the visitor enters the cellphone number
                    $phone = $this->input->post('phone');
                    $is_checkin = $this->m_visitor->is_checkin($phone);

                    // When a visitor is checked in, the system will refuse to check in
                    if ($is_checkin) {
                        $this->session->set_flashdata('message', 'is-checkin');
                        redirect('visitor/check_in/' . $id . '');
                    } else {

                        // The system will send a verification link via SMS
                        $token = uniqid();
                        $data = [
                            'phone' => $phone,
                            'token' => $token
                        ];

                        $verify = $this->m_visitor->get_user('sms_verify', 'phone', $phone);
                        if ($verify) {
                            $this->m_visitor->update('sms_verify', $data, 'phone', $phone);
                        } else {
                            $this->m_visitor->insert('sms_verify', $data);
                        }

                        $result = $this->_otp_sender($phone, $token);

                        // Respone 1 if the SMS succedd, and other if the SMS failed
                        if ($result[0]['status'] == 1) {
                            $this->session->set_flashdata('message', 'sms-success');
                            $this->session->set_userdata('phone', $phone);
                            $this->session->set_userdata('status', 'verify');
                            redirect('visitor');
                        } else {
                            $this->session->set_flashdata('message', 'sms-error');
                            $this->m_visitor->delete('sms_verify', 'phone', $phone);
                            redirect('visitor/check_in/' . $id . '');
                        }
                    }
                }
            }
        } else {
            $this->load->view('404');
        }
    }

    // SMS Sender with gateway from medansms.com
    private function _otp_sender($phone, $token)
    {
        $email_api    = urlencode("gayuhridho369@gmail.com");
        $passkey_api  = urlencode("Hm123123");
        $phone_ = urlencode($phone);
        $message = urlencode("Click this link to verify your account : " . base_url() . "visitor/verify?phone=" . $phone . "&token=" . $token . " ");

        $url          = "https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=" . $email_api . "&passkey=" . $passkey_api . "&no_tujuan=" . $phone_ . "&pesan=" . $message . "&json=1";
        $result       = $this->_send_api($url);
        $resultArr = json_decode($result, true);
        return $resultArr;
    }

    // Sending with curl
    private function _send_api($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response  = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    // Verification link is true or false
    public function verify()
    {
        $phone = $this->input->get('phone');
        $token = $this->input->get('token');

        if ($phone != $this->session->userdata('phone')) {
            $this->session->set_flashdata('message', 'checkin-error');
            redirect('visitor');
        } else {
            $user = $this->m_visitor->get_user('sms_verify', 'phone', $phone);
            if ($user) {
                $token_ = $this->m_visitor->get_user('sms_verify', 'token', $token);
                if ($token_) {
                    $data = [
                        'phone' => $phone,
                        'public_space_id' => $this->session->userdata('public_space_id')
                    ];

                    $this->m_visitor->insert('record', $data);
                    $this->m_visitor->delete('sms_verify', 'phone', $phone);

                    $this->session->set_userdata('status', 'in');

                    $this->session->set_flashdata('message', 'checkin-success');
                    redirect('visitor');
                } else {
                    $this->session->set_flashdata('message', 'checkin-error');
                    redirect('visitor');
                }
            } else {
                $this->session->set_flashdata('message', 'checkin-error');
                redirect('visitor');
            }
        }
    }

    // Method for visitors to checkout by scanning the QR code at the exit
    public function check_out($id)
    {
        $data['public_space'] = $this->m_visitor->get_user('public_space', 'id', $id);
        if ($data['public_space']) {
            if ($id == $this->session->userdata('public_space_id')) {

                $phone = $this->session->userdata('phone');
                $public_space_id = $this->session->userdata('public_space_id');

                $is_checkin = $this->m_visitor->is_checkin($phone);

                if ($is_checkin == NULL) {
                    $this->session->set_flashdata('message', 'checkout-error');
                    redirect('visitor');
                } else {

                    $data = ["check_out" => date("Y-m-d H:i:s")];
                    $this->m_visitor->update('record', $data, 'id', $is_checkin['id']);

                    $this->session->unset_userdata('public_space_id');
                    $this->session->set_userdata('status', 'out');
                    $this->session->set_flashdata('message', 'checkout-success');

                    redirect('visitor');
                }
            } else {
                $this->session->set_flashdata('message', 'checkout-error');
                redirect('visitor');
            }
        } else {
            $this->load->view('404');
        }
    }
}
