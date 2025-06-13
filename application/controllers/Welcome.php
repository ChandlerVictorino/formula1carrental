<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('m_rental');
        $this->load->library(['form_validation', 'session']);
    }

    public function index(){
        $this->load->view('login');
    }

    public function login(){
        // Set form validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_type', 'User Type', 'required|in_list[superadmin,admin]');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed - reload login with errors
            $this->load->view('login');
            return;
        }

        // Get sanitized inputs
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $user_type = $this->input->post('user_type', TRUE);

        if ($user_type === 'superadmin') {
            $superadmin = $this->m_rental->get_superadmin_by_username($username);
            if ($superadmin && password_verify($password, $superadmin->superadmin_password)) {
                $this->set_session($superadmin->superadmin_id, $superadmin->superadmin_username, 'superadmin');
                redirect(base_url('superadmin/dashboard'));
            } else {
                $data['error'] = 'Invalid username or password.';
                $this->load->view('login', $data);
            }
        } elseif ($user_type === 'admin') {
            $admin = $this->m_rental->get_admin_by_username($username);
            if ($admin && password_verify($password, $admin->admin_password)) {
                $this->set_session($admin->admin_id, $admin->admin_name, 'admin');
                redirect(base_url('admin'));
            } else {
                $data['error'] = 'Invalid username or password.';
                $this->load->view('login', $data);
            }
        } else {
            $data['error'] = 'Invalid user type selected.';
            $this->load->view('login', $data);
        }
    }

    private function set_session($id, $name, $role) {
        // Regenerate session ID to prevent fixation attacks
        $this->session->sess_regenerate(TRUE);
        $session_data = [
            'id' => $id,
            'name' => $name,
            'role' => $role,
            'status' => 'login'
        ];
        $this->session->set_userdata($session_data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('welcome?pesan=logout');
    }
}


