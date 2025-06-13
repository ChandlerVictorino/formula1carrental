<?php
class M_rental extends CI_Model {
    
    function edit_data($where, $table){
        return $this->db->get_where($table, $where);
    }

    function get_data($table){
        return $this->db->get($table);
    }

    function insert_data($data, $table){
        $this->db->insert($table, $data);
    }

    function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    // ✅ Add this method to fix the error in delete_confirmed()
    public function check_login($username, $password) {
        $this->db->where('admin_username', $username);
        $this->db->where('admin_password', $password);
        $this->db->where('role', 'superadmin'); // Only if you store role info
        return $this->db->get('admin')->row(); // Returns null if not found
    }
}
