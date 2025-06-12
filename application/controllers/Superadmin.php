<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        // Check if logged in and user is superadmin
        if ($this->session->userdata('role') != 'superadmin') {
            redirect(base_url().'welcome?pesan=belumlogin');
        }
    }

    public function dashboard() {
        $this->load->view('superadmin/dashboard');
    }
}
