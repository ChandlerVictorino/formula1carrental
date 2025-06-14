<?php
class M_rental extends CI_Model {

    // Generic data operations
    public function get_data($table) {
        return $this->db->get($table);
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_data($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // ✅ Get superadmin row by username (used with password_verify)
    public function check_superadmin_by_username($username) {
        return $this->db
            ->where('superadmin_username', $username)
            ->get('superadmin')
            ->row();
    }

    // ✅ Update superadmin password securely using password_hash
    public function update_superadmin_password($superadmin_id, $new_password) {
        $hashed = password_hash($new_password, PASSWORD_DEFAULT);
        return $this->db
            ->where('superadmin_id', $superadmin_id)
            ->update('superadmin', ['superadmin_password' => $hashed]);
    }

    // ✅ Get admin row by username (used with password_verify)
    public function get_admin_by_username($username) {
        return $this->db
            ->where('admin_username', $username)
            ->get('admin')
            ->row();
    }

    // ✅ Update admin password securely
    public function update_admin_password($admin_id, $new_password) {
        $hashed = password_hash($new_password, PASSWORD_DEFAULT);
        return $this->db
            ->where('admin_id', $admin_id)
            ->update('admin', ['admin_password' => $hashed]);
    }
}
