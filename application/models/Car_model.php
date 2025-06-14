<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_cars() {
        return $this->db->get('mobile')->result();
    }

    public function get_car_by_id($id) {
        return $this->db->get_where('mobile', ['mobile_id' => $id])->row();
    }

    public function delete_car($id) {
        return $this->db->delete('mobile', ['mobile_id' => $id]);
    }
}
