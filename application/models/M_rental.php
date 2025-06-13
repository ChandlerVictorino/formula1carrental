<?php
class M_rental extends CI_Model {

    public function get_data($table) {
        return $this->db->get($table);
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function update_data($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_data($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
    }

    // ✅ Secure password update using password_hash
    public function update_superadmin_password($id, $new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $this->db->where('superadmin_id', $id);
        $this->db->update('superadmin', ['superadmin_password' => $hashed_password]);
    }

    // ✅ Get superadmin by username (for login with password_verify)
    public function get_superadmin_by_username($username) {
        return $this->db->get_where('superadmin', ['superadmin_username' => $username])->row();
    }

    // ✅ Get admin by username (for login with password_verify)
    public function get_admin_by_username($username) {
        return $this->db->get_where('admin', ['admin_username' => $username])->row();
    }

    // ❗️Optional legacy method - use only if you're still using md5-based login elsewhere
    public function check_superadmin($username, $password) {
        return $this->db->get_where('superadmin', [
            'superadmin_username' => $username,
            'superadmin_password' => $password
        ]);
    }
}
