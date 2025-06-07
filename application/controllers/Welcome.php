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
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        if($this->form_validation->run() != false){
            $where = array(
                'admin_username' => $username,
                'admin_password' => md5($password)
            );
          $data = $this->m_rental->edit_data($where, 'admin');
$cek = $data->num_rows();

if ($cek > 0) {
    $d = $data->row();

    // Check if expected properties exist
    if (isset($d->admin_id) && isset($d->admin_nama)) {
        $session = array(
            'id' => $d->admin_id,
            'nama' => $d->admin_nama,
            'status' => 'login'
        );
        $this->session->set_userdata($session);
        redirect(base_url().'admin');
    } else {
        // Fallback: data row is missing expected fields
        redirect(base_url().'welcome?pesan=data_incomplete');
    }
} else {
    redirect(base_url().'welcome?pesan=gagal');
}

        } else {
            $this->load->view('login');
        }
    }
}
