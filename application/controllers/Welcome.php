<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_rental');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function index(){
        $this->load->view('login');
    }

    public function login(){
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $user_type = $this->input->post('user_type');

        // Validate form inputs
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');

        if ($this->form_validation->run() != false) {

            if ($user_type === 'superadmin') {
                $superadmin = $this->m_rental->check_superadmin_by_username($username);

                if ($superadmin && password_verify($password, $superadmin->superadmin_password)) {
                    $session = array(
                        'id' => $superadmin->superadmin_id,
                        'name' => $superadmin->superadmin_username,
                        'role' => 'superadmin',
                        'status' => 'login'
                    );
                    $this->session->set_userdata($session);
                    redirect(base_url().'superadmin/dashboard');
                } else {
                    redirect(base_url().'welcome?pesan=gagal');
                }

            } else if ($user_type === 'admin') {
                $admin = $this->m_rental->get_admin_by_username($username);

                if ($admin && password_verify($password, $admin->admin_password)) {
                    $session = array(
                        'id' => $admin->admin_id,
                        'name' => $admin->admin_name,
                        'role' => 'admin',
                        'status' => 'login'
                    );
                    $this->session->set_userdata($session);
                    redirect(base_url().'admin');
                } else {
                    redirect(base_url().'welcome?pesan=gagal');
                }

            } else {
                redirect(base_url().'welcome?pesan=gagal');
            }

        } else {
            $this->load->view('login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('welcome?pesan=logout');
    }
}
