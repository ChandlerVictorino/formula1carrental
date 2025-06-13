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

    
    public function check_login($username, $password) {
        return $this->db
            ->where('admin_username', $username)
            ->where('admin_password', $password)
            ->where('role', 'superadmin') // optional if you want to strictly verify role
            ->get('admin');
    }
    
}
