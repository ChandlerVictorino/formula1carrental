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

    public function update_superadmin_password($id, $new_password) {
        $this->db->where('superadmin_id', $id);
        $this->db->update('superadmin', ['superadmin_password' => md5($new_password)]);
    }

    public function check_superadmin($username, $password) {
        return $this->db->get_where('superadmin', [
            'superadmin_username' => $username,
            'superadmin_password' => $password
        ]);
    }
}
