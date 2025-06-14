<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // ✅ Fetch all cars from 'mobile' table
    public function get_all_cars() {
        return $this->db->get('mobile')->result();
    }

    // ✅ Insert new car into 'mobile' table
    public function insert_car($data) {
        return $this->db->insert('mobile', $data);
    }

    // ✅ Get a single car by ID
    public function get_car_by_id($id) {
        return $this->db->get_where('mobile', ['mobile_id' => $id])->row();
    }

    // ✅ Delete a car by ID
    public function delete_car($id) {
        return $this->db->delete('mobile', ['mobile_id' => $id]);
    }
}
