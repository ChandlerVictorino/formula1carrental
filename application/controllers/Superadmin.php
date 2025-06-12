<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_rental');
        if ($this->session->userdata('role') !== 'superadmin') {
            redirect('welcome?pesan=forbidden');
        }
    }

    public function dashboard() {
        $data['admins'] = $this->m_rental->get_data('admin')->result();
        $this->load->view('superadmin/dashboard', $data);
    }

    public function create_admin() {
        $this->load->view('superadmin/create_admin');
    }

    public function store_admin() {
        $data = [
            'admin_name' => $this->input->post('admin_name'),
            'admin_username' => $this->input->post('admin_username'),
            'admin_password' => md5($this->input->post('admin_password'))
        ];
        $this->m_rental->insert_data($data, 'admin');
        redirect('superadmin/dashboard');
    }

    public function edit_admin($id) {
        $where = ['admin_id' => $id];
        $data['admin'] = $this->m_rental->edit_data($where, 'admin')->row();
        $this->load->view('superadmin/edit_admin', $data);
    }

    public function update_admin() {
        $id = $this->input->post('admin_id');
        $data = [
            'admin_name' => $this->input->post('admin_name'),
            'admin_username' => $this->input->post('admin_username')
        ];
        if ($this->input->post('admin_password')) {
            $data['admin_password'] = md5($this->input->post('admin_password'));
        }
        $where = ['admin_id' => $id];
        $this->m_rental->update_data($where, $data, 'admin');
        redirect('superadmin/dashboard');
    }

    public function delete_admin($id) {
        $where = ['admin_id' => $id];
        $this->m_rental->delete_data($where, 'admin');
        redirect('superadmin/dashboard');
    }
}
