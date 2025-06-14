<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fetch all cars from 'mobile' table
    public function get_all_cars() {
        return $this->db->get('mobile')->result();
    }

    // Insert new car into 'mobile' table
    public function insert_car($data) {
        return $this->db->insert('mobile', $data);
    }
}
