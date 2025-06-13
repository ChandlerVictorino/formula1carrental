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

    
public function delete_confirmed() {
    $admin_id = $this->input->post('admin_id');
    $entered_password = md5($this->input->post('superadmin_password'));

    $username = $this->session->userdata('username');  // should be 'admin'

    $superadmin = $this->m_rental->check_superadmin($username, $entered_password);

    if ($superadmin->num_rows() > 0) {
        $this->m_rental->delete_data(['admin_id' => $admin_id], 'admin');
        $this->session->set_flashdata('success', 'Admin deleted successfully.');
    } else {
        $this->session->set_flashdata('error', 'Incorrect password. Deletion cancelled.');
    }

    redirect('superadmin/dashboard');
}
    
}
