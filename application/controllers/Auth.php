<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email')) {
            redirect('public_space');
        }

        $this->load->model('m_auth');
    }

    // Method for the login of public space
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/header');
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->m_auth->get_user('public_space', 'email', $email);

            if ($user) {
                if ($user['actived'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        $this->session->set_userdata('email', $user['email']);

                        $this->session->set_flashdata('message', 'login-success');
                        redirect('public_space');
                    } else {
                        $this->session->set_flashdata('message', 'wrong-password');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', 'not-actived');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', 'not-registered');
                redirect('auth');
            }
        }
    }

    // Method for registration of public space
    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
        $this->form_validation->set_rules('address', 'Address', 'required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[public_space.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
        $this->form_validation->set_rules('passconf', 'Repeat Password', 'required|min_length[3]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/header');
            $this->load->view('auth/registration');
            $this->load->view('auth/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'address' => htmlspecialchars($this->input->post('address', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'actived' => 0
            ];

            $token = base64_encode(random_bytes(32));
            $data_token = [
                'email' => $email,
                'token' => $token
            ];

            $this->m_auth->insert('public_space', $data);
            $this->m_auth->insert('email_verify', $data_token);

            $this->_send_email($token);

            $this->session->set_flashdata('message', 'registration-success');
            redirect('auth');
        }
    }

    // Sending link verification to email after registration
    private function _send_email($token)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'gayuhridho369@gmail.com',
            'smtp_pass' => 'Grgmail369',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->email->initialize($config);
        $this->email->from('gayuhridho369@gmail.com', 'GR Office');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Account Verification - Movement and Tracking System');
        $this->email->message('Click this link to verify your account : 
                <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">
				Activation Account </a>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    // Verification link to create an active account 
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->m_auth->get_user('public_space', 'email', $email);

        if ($user) {
            $user_token = $this->m_auth->get_user('email_verify', 'token', $token);
            if ($user_token) {

                $qr_in = 'visitor/check_in/' . $user['id'];
                $qr_out = 'visitor/check_out/' . $user['id'];

                $this->m_auth->update('public_space', ['qr_in' => $qr_in], 'email', $email);
                $this->m_auth->update('public_space', ['qr_out' => $qr_out], 'email', $email);
                $this->m_auth->update('public_space', ['actived' => 1], 'email', $email);
                $this->m_auth->delete('email_verify', 'email', $email);

                $this->session->set_flashdata('message', 'activation-success');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', 'activation-error');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', 'activation-error');
            redirect('auth');
        }
    }
}
