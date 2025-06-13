<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_rental');

        // Redirect non-superadmins
        if ($this->session->userdata('role') !== 'superadmin') {
            redirect('welcome');
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
        $data = array(
            'admin_name' => $this->input->post('admin_name'),
            'admin_username' => $this->input->post('admin_username'),
            'admin_password' => md5($this->input->post('admin_password'))
        );

        $this->m_rental->insert_data($data, 'admin');
        redirect('superadmin/dashboard');
    }

    public function edit_admin($id) {
        $where = array('admin_id' => $id);
        $data['admin'] = $this->m_rental->edit_data($where, 'admin')->row();
        $this->load->view('superadmin/edit_admin', $data);
    }

    public function update_admin() {
        $admin_id = $this->input->post('admin_id');

        $update_data = array(
            'admin_name' => $this->input->post('admin_name'),
            'admin_username' => $this->input->post('admin_username')
        );

        if (!empty($this->input->post('admin_password'))) {
            $update_data['admin_password'] = md5($this->input->post('admin_password'));
        }

        $where = array('admin_id' => $admin_id);
        $this->m_rental->update_data($where, $update_data, 'admin');
        redirect('superadmin/dashboard');
    }

    public function delete_confirmed() {
        $admin_id = $this->input->post('admin_id');
        $entered_password = md5($this->input->post('superadmin_password'));

        $username = $this->session->userdata('username');

        // Use the correct method from model
        $superadmin = $this->m_rental->check_superadmin($username, $entered_password);

        if ($superadmin->num_rows() > 0) {
            $this->m_rental->delete_data(['admin_id' => $admin_id], 'admin');
            $this->session->set_flashdata('success', 'Admin deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Incorrect password. Deletion cancelled.');
        }

        redirect('superadmin/dashboard');
    }

    public function change_password_view() {
        $this->load->view('superadmin/change_password');
    }

    public function change_password() {
        $superadmin_id = $this->session->userdata('superadmin_id');
        $old_password = md5($this->input->post('old_password'));
        $new_password = $this->input->post('new_password');

        $username = $this->session->userdata('username');
        $superadmin = $this->m_rental->check_superadmin($username, $old_password);

        if ($superadmin->num_rows() > 0) {
            $this->m_rental->update_superadmin_password($superadmin_id, $new_password);
            $this->session->set_flashdata('success', 'Password updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Incorrect current password.');
        }

        redirect('superadmin/change_password_view');
    }
}
