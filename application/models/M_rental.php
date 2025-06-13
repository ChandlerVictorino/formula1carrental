<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rental extends CI_Model {

    public function get_admin_by_username($username) {
        return $this->db->get_where('admin', ['admin_username' => $username])->row();
    }

    public function get_superadmin_by_username($username) {
        return $this->db->get_where('superadmin', ['superadmin_username' => $username])->row();
    }

    public function update_superadmin_password($id, $new_password) {
        $hash = password_hash($new_password, PASSWORD_DEFAULT);
        $this->db->where('superadmin_id', $id)
                 ->update('superadmin', ['superadmin_password' => $hash]);
    }

    // Basic CRUD for admin users
    public function get_all_admins() {
        return $this->db->get('admin')->result();
    }
    public function insert_admin($data) {
        $this->db->insert('admin', $data);
    }
    public function get_admin($id) {
        return $this->db->get_where('admin', ['admin_id' => $id])->row();
    }
    public function update_admin($id, $data) {
        $this->db->where('admin_id', $id)->update('admin', $data);
    }
    public function delete_admin($id) {
        $this->db->where('admin_id', $id)->delete('admin');
    }
}
