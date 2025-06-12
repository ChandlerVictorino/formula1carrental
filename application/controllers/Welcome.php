<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Form_validation $form_validation
 * @property CI_Email $email
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * // Add your model(s)
 * @property m_rental $m_rental
 */



class Welcome extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_rental');
    }
    
    public function index(){
        $this->load->view('login');
    }
    
   function login(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if($this->form_validation->run() != false){
        // Find user by username
        $where = array('admin_username' => $username);
        $data = $this->m_rental->edit_data($where, 'admin');

        if ($data->num_rows() > 0) {
            $user = $data->row();

            // Verify entered password with hashed password in DB
            if (password_verify($password, $user->admin_password)) {
                $session = array(
                    'id' => $user->admin_id,
                    'name' => $user->admin_name,
                    'status' => 'login'
                );
                $this->session->set_userdata($session);
                redirect(base_url().'admin');
            } else {
                redirect(base_url().'welcome?pesan=gagal'); // Password incorrect
            }
        } else {
            redirect(base_url().'welcome?pesan=gagal'); // Username not found
        }
    } else {
        $this->load->view('login');
    }
}

}
