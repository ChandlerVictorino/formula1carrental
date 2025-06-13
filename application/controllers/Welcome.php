<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_rental');
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['form_validation', 'session']);
    }

    public function index() {
        // If already logged in, redirect
        if ($this->session->userdata('status') === 'login') {
            $role = $this->session->userdata('role');
            redirect($role === 'superadmin' ? 'superadmin/dashboard' : 'admin/dashboard');
        }
        $this->load->view('login');
    }

    public function login() {
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('user_type','User Type','required|in_list[superadmin,admin]');

        if ($this->form_validation->run() === FALSE) {
            return $this->load->view('login');
        }

        $u = $this->input->post('username', TRUE);
        $p = $this->input->post('password', TRUE);
        $t = $this->input->post('user_type', TRUE);

        if ($t === 'superadmin') {
            $sa = $this->m_rental->get_superadmin_by_username($u);
            if ($sa && password_verify($p, $sa->superadmin_password)) {
                $this->set_session($sa->superadmin_id, $sa->superadmin_username, 'superadmin');
                return redirect('superadmin/dashboard');
            }
        } else {
            $ad = $this->m_rental->get_admin_by_username($u);
            if ($ad && password_verify($p, $ad->admin_password)) {
                $this->set_session($ad->admin_id, $ad->admin_username, 'admin');
                return redirect('admin/dashboard');
            }
        }

        $data['error'] = 'Invalid username or password.';
        return $this->load->view('login', $data);
    }

    private function set_session($id, $name, $role) {
        $this->session->sess_regenerate(TRUE);
        $this->session->set_userdata([
            'id' => $id,
            'name' => $name,
            'role' => $role,
            'status' => 'login'
        ]);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('welcome?pesan=logout');
    }
}
