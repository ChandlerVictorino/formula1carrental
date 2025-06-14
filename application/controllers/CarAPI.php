<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarAPI extends CI_Controller {

    private $api_token = 'your_secure_token_123'; // Replace with a secure token

    public function __construct() {
        parent::__construct();
        $this->load->model('Car_model'); // Load your car model
        $this->load->helper(['security', 'url']);
        header('Content-Type: application/json');
    }

    private function authenticate() {
        $headers = $this->input->request_headers();
        if (!isset($headers['Authorization']) || $headers['Authorization'] !== 'Bearer ' . $this->api_token) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }
    }

    // GET: List all cars
    public function index() {
        $this->authenticate();
        $cars = $this->Car_model->get_all_cars();
        echo json_encode($cars);
    }

    // POST: Add a new car
    public function create() {
        $this->authenticate();
        $input = json_decode(trim(file_get_contents("php://input")), true);

        $data = [
            'mobile_carname' => $this->security->xss_clean($input['carname']),
            'mobile_plate' => $this->security->xss_clean($input['plate']),
            'mobile_color' => $this->security->xss_clean($input['color']),
            'mobile_year' => (int)$input['year'],
            'mobile_status' => (int)$input['status']
        ];

        $this->Car_model->insert_car($data);
        echo json_encode(['message' => 'Car added successfully']);
    }
}
