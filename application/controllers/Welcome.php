<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_rental');
    }

    public function index(){
        $this->load->view('login');
    }

    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user_type = $this->input->post('user_type');

        // Validate form
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');

        if($this->form_validation->run() != false){

            // Super Admin Login (from database)
            if ($user_type === 'superadmin') {
                $superadmin = $this->m_rental->check_superadmin($username, md5($password));
                if ($superadmin->num_rows() > 0) {
                    $row = $superadmin->row();
                    $session = array(
                        'id' => $row->superadmin_id,
                        'name' => $row->superadmin_username,
                        'role' => 'superadmin',
                        'status' => 'login'
                    );
                    $this->session->set_userdata($session);
                    redirect(base_url().'superadmin/dashboard');
                } else {
                    redirect(base_url().'welcome?pesan=gagal');
                }

            // Admin Login (from database)
            } else if ($user_type === 'admin') {
                $where = array(
                    'admin_username' => $username,
                    'admin_password' => md5($password)
                );
                $data = $this->m_rental->edit_data($where, 'admin');
                $d = $data->row();
                $cek = $data->num_rows();

                if($cek > 0){
                    $session = array(
                        'id' => $d->admin_id,
                        'name' => $d->admin_name,
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

    // ✅ LOGOUT FUNCTION
    public function logout(){
        $this->session->sess_destroy();
        redirect('welcome?pesan=logout');
    }
}
