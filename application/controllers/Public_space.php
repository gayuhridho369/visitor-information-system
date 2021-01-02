<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Public_space extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $this->load->model('m_public_space');
    }

    public function index()
    {
        $user = $this->session->userdata('email');
        $data['public_space'] = $this->m_public_space->get_user('public_space', 'email', $user);

        $data['inside'] = $this->m_public_space->count_inside($data['public_space']['id']);
        $data['today'] = $this->m_public_space->count_today($data['public_space']['id']);
        $data['yesterday'] = $this->m_public_space->count_yesterday($data['public_space']['id']);
        $data['thisweek'] = $this->m_public_space->count_thisweek($data['public_space']['id']);

        $this->load->view('public_space/header');
        $this->load->view('public_space/topbar');
        $this->load->view('public_space/sidebar', $data);
        $this->load->view('public_space/dashboard');
        $this->load->view('public_space/footer');
    }

    public function chartdata()
    {
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('public_space', ['email' => $email])->row_array();

        $month = date("m", time());
        for ($i = 1; $i <= $month; $i++) {
            $data[$i] = $this->m_public_space->datamonth($i, $user['id']);
        }

        echo json_encode(array_values($data));
    }

    public function visitor_inside()
    {
        $user = $this->session->userdata('email');
        $data['public_space'] = $this->m_public_space->get_user('public_space', 'email', $user);
        $data['inside'] = $this->m_public_space->visitor_inside($data['public_space']['id']);

        $this->load->view('public_space/header');
        $this->load->view('public_space/topbar');
        $this->load->view('public_space/sidebar', $data);
        $this->load->view('public_space/visitor_inside', $data);
        $this->load->view('public_space/footer');
    }

    public function check_out($id)
    {
        $this->m_public_space->check_out($id);

        echo json_encode(["status" => TRUE]);
    }

    public function visitor_history()
    {
        $user = $this->session->userdata('email');
        $data['public_space'] = $this->m_public_space->get_user('public_space', 'email', $user);

        if ($this->input->get('date')) {
            $date = explode("-", $this->input->get('date'));
            // var_dump($date);
            // die;
            $date1 =  str_replace('/', '-', $date[0]);
            $date1 = date("Y-m-d H:i:s", strtotime($date1));
            $date2 = str_replace('/', '-', $date[1]);
            $date2 = date("Y-m-d H:i:s", strtotime($date2));


            $data['history'] = $this->m_public_space->visitor_history_date($data['public_space']['id'], $date1, $date2);
        } else {
            $data['history'] = $this->m_public_space->visitor_history($data['public_space']['id']);
        }

        $this->load->view('public_space/header');
        $this->load->view('public_space/topbar');
        $this->load->view('public_space/sidebar', $data);
        $this->load->view('public_space/visitor_history', $data);
        $this->load->view('public_space/footer');
    }

    public function account()
    {
        $user = $this->session->userdata('email');
        $data['public_space'] = $this->m_public_space->get_user('public_space', 'email', $user);

        $data['get_change'] = $this->input->get('change');

        if ($this->input->get('change') == 'name') {
            $this->form_validation->set_rules('name', 'name', 'required|min_length[3]');
        }
        if ($this->input->get('change') == 'address') {
            $this->form_validation->set_rules('address', 'Address', 'required|min_length[5]');
        }
        if ($this->input->get('change') == 'email') {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[public_space.email]');
            $this->form_validation->set_rules('password', 'Password', 'callback_password_verify');
            $this->form_validation->set_rules('passconf', 'Repeat Password', 'required|matches[password]');
        }
        if ($this->input->get('change') == 'password') {
            $this->form_validation->set_rules('passcurr', 'Current Password', 'callback_password_verify');
            $this->form_validation->set_rules('passnew', 'New Password', 'required|min_length[3]');
            $this->form_validation->set_rules('passconf', 'Repeat New Password', 'required|matches[passnew]');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('public_space/header');
            $this->load->view('public_space/topbar');
            $this->load->view('public_space/sidebar', $data);
            $this->load->view('public_space/account', $data);
            $this->load->view('public_space/footer');
        } else {
            if ($this->input->get('change') == 'name') {
                $name =  htmlspecialchars($this->input->post('name', true));
                $this->m_public_space->update('public_space', ['name' => $name], 'email', $data['public_space']['email']);

                $this->session->set_flashdata('message', 'change-success');
                redirect('public_space/account');
            }
            if ($this->input->get('change') == 'address') {
                $address =  htmlspecialchars($this->input->post('address', true));
                $this->m_public_space->update('public_space', ['address' => $address], 'email', $data['public_space']['email']);

                $this->session->set_flashdata('message', 'change-success');
                redirect('public_space/account');
            }
            if ($this->input->get('change') == 'email') {
                $email =  htmlspecialchars($this->input->post('email', true));
                $this->m_public_space->update('public_space', ['email' => $email], 'email', $data['public_space']['email']);

                $this->session->set_userdata('email', $email);

                $this->session->set_flashdata('message', 'change-success');
                redirect('public_space/account');
            }
            if ($this->input->get('change') == 'password') {
                $password =  password_hash($this->input->post('passnew'), PASSWORD_DEFAULT);
                $this->m_public_space->update('public_space', ['password' => $password], 'email', $data['public_space']['email']);

                $this->session->set_flashdata('message', 'change-success');
                redirect('public_space/account');
            }
        }
    }

    public function password_verify($password)
    {
        $user = $this->session->userdata('email');
        $public_space = $this->m_public_space->get_user('public_space', 'email', $user);
        if ($password == '') {
            $this->form_validation->set_message('password_verify', 'The %s field is required.');
            return FALSE;
        } elseif (!password_verify($password, $public_space['password'])) {
            $this->form_validation->set_message('password_verify', 'The %s is wrong.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function print_qrcode()
    {
        $this->load->library('Efpdf');

        $email = $this->session->userdata('email');
        $user = $this->db->get_where('public_space', ['email' => $email])->row_array();

        $qr_in_name = $user['id'] . '-in';
        $qr_out_name = $user['id'] . '-out';

        $qr_in = base_url() . 'visitor/check_in/' . $user['id'];
        $qr_out = base_url() . 'visitor/check_out/' . $user['id'];

        $this->_qrcode_generator($qr_in, $qr_in_name);
        $this->_qrcode_generator($qr_out, $qr_out_name);

        $pdf = new FPDF();

        $pdf->SetTitle('Print QR-Code');

        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 30);
        $pdf->Cell(0, 25, $user['name'], 0, 1, 'C');
        $pdf->Image('./assets/qrcode/' . $qr_in_name . '.png', 60, 45, 90, 0, 'PNG');
        $pdf->SetFont('Arial', '', 20);
        $pdf->Cell(0, 5, 'QR - Check In', 3, 5, 'C');

        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 30);
        $pdf->Cell(0, 25, $user['name'], 0, 1, 'C');
        $pdf->Image('./assets/qrcode/' . $qr_out_name . '.png', 60, 45, 90, 0, 'PNG');
        $pdf->SetFont('Arial', '', 20);
        $pdf->Cell(0, 5, 'QR - Check Out', 3, 5, 'C');

        $pdf->Output();
    }

    private function _qrcode_generator($qrcode, $name)
    {
        $this->load->library('ciqrcode');

        $params['data'] = $qrcode;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . './assets/qrcode/' . $name . '.png';
        $this->ciqrcode->generate($params);
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('message', 'logout-success');
        redirect('auth');
    }
}
