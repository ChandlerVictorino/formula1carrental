<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_rental');
        $this->load->library(['form_validation', 'upload']);
        $this->load->helper(['security', 'form', 'url']);

        if ($this->session->userdata('role') !== 'superadmin') {
            redirect('welcome');
        }
    }

    public function dashboard() {
        $data['admins'] = $this->m_rental->get_data('admin')->result();
        $data['superadmin_name'] = $this->session->userdata('name');
        $this->load->view('superadmin/dashboard', $data);
    }

    public function create_admin() {
        $this->load->view('superadmin/create_admin');
    }

    public function store_admin() {
        $this->form_validation->set_rules('admin_name', 'Name', 'required|trim');
        $this->form_validation->set_rules('admin_username', 'Username', 'required|trim|is_unique[admin.admin_username]');
        $this->form_validation->set_rules('admin_password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('superadmin/create_admin');
            return;
        }

        $config['upload_path'] = './uploads/admins/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 1024;
        $this->upload->initialize($config);

        $image_name = null;
        if (!empty($_FILES['admin_image']['name'])) {
            if (!$this->upload->do_upload('admin_image')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('superadmin/create_admin');
                return;
            } else {
                $image_data = $this->upload->data();
                $image_name = $image_data['file_name'];
            }
        }

        $data = [
            'admin_name' => $this->input->post('admin_name', TRUE),
            'admin_username' => $this->input->post('admin_username', TRUE),
            'admin_password' => password_hash($this->input->post('admin_password', TRUE), PASSWORD_DEFAULT),
            'admin_image' => $image_name
        ];

        $this->m_rental->insert_data($data, 'admin');
        $this->session->set_flashdata('success', 'Admin created successfully.');
        redirect('superadmin/dashboard');
    }

    public function edit_admin($id) {
        $where = ['admin_id' => $id];
        $data['admin'] = $this->m_rental->edit_data($where, 'admin')->row();
        $this->load->view('superadmin/edit_admin', $data);
    }

    public function update_admin() {
        $admin_id = $this->input->post('admin_id');
        $update_data = [
            'admin_name' => $this->input->post('admin_name', TRUE),
            'admin_username' => $this->input->post('admin_username', TRUE)
        ];

        if (!empty($this->input->post('admin_password'))) {
            $update_data['admin_password'] = password_hash($this->input->post('admin_password', TRUE), PASSWORD_DEFAULT);
        }

        if (!empty($_FILES['admin_image']['name'])) {
            $config['upload_path'] = './uploads/admins/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1024;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('admin_image')) {
                $image_data = $this->upload->data();
                $update_data['admin_image'] = $image_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('superadmin/edit_admin/' . $admin_id);
                return;
            }
        }

        $where = ['admin_id' => $admin_id];
        $this->m_rental->update_data($where, $update_data, 'admin');
        $this->session->set_flashdata('success', 'Admin updated successfully.');
        redirect('superadmin/dashboard');
    }

    public function delete_admin($id) {
        $this->m_rental->delete_data(['admin_id' => $id], 'admin');
        $this->session->set_flashdata('success', 'Admin deleted successfully.');
        redirect('superadmin/dashboard');
    }

    public function change_info_view() {
        $superadmin = $this->m_rental->check_superadmin_by_username('superadmin');
        $data['superadmin'] = $superadmin;
        $this->load->view('superadmin/change_info', $data);
    }

    public function update_info() {
        $this->form_validation->set_rules('admin_name', 'Name', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('superadmin/change_info_view');
            return;
        }

        $name = $this->input->post('admin_name', TRUE);
        $password = $this->input->post('password', TRUE);
        $update_data = ['superadmin_username' => $name];

        if (!empty($password)) {
            $update_data['superadmin_password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->db->where('superadmin_username', 'superadmin');
        $this->db->update('superadmin', $update_data);

        $this->session->set_userdata('name', $name);
        $this->session->set_flashdata('success', 'Info updated successfully.');
        redirect('superadmin/change_info_view');
    }

    // ⚠ TEMPORARY FUNCTION: Hash superadmin's plain password
    public function hash_my_password_now() {
        $plain_password = 'password123'; // change as needed
        $hashed = password_hash($plain_password, PASSWORD_DEFAULT);

        $this->db->where('superadmin_username', 'superadmin')
                 ->update('superadmin', ['superadmin_password' => $hashed]);

        echo "✅ Superadmin password has been hashed.";
    }
}
