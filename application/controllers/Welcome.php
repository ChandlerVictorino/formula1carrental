<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('m_rental');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form', 'security']);
    }

    public function index(){
        // Redirect if already logged in
        if ($this->session->userdata('status') === 'login') {
            $role = $this->session->userdata('role');
            if ($role === 'superadmin') {
                redirect('superadmin/dashboard');
            } elseif ($role === 'admin') {
                redirect('admin/dashboard');
            }
        }

        $this->load->view('login');
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('user_type', 'User Type', 'required|in_list[superadmin,admin]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
            return;
        }

        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $user_type = $this->input->post('user_type', TRUE);

        if ($user_type === 'superadmin') {
            $superadmin = $this->m_rental->get_superadmin_by_username($username);
            if ($superadmin && password_verify($password, $superadmin->superadmin_password)) {
                $this->set_session($superadmin->superadmin_id, $superadmin->superadmin_username, 'superadmin');
                redirect('superadmin/dashboard');
                return;
            }
        } else if ($user_type === 'admin') {
            $admin = $this->m_rental->get_admin_by_username($username);
            if ($admin && password_verify($password, $admin->admin_password)) {
                $this->set_session($admin->admin_id, $admin->admin_username, 'admin');
                redirect('admin/dashboard');
                return;
            }
        }

        $data['error'] = 'Invalid username or password.';
        $this->load->view('login', $data);
    }

    private function set_session($id, $username, $role) {
        $this->session->sess_regenerate(TRUE);
        $this->session->set_userdata([
            'id' => $id,
            'name' => $username,
            'role' => $role,
            'status' => 'login'
        ]);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('welcome?pesan=logout');
    }
}
