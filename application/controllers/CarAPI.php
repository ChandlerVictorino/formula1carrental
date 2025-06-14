<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarAPI extends CI_Controller {

    private $api_token = 'your_secure_token_123';

    public function __construct() {
        parent::__construct();
        $this->load->model('Car_model');
        $this->load->helper(['security', 'url']);
        $this->output->set_content_type('application/json');
    }

    // 🔒 Token Authentication
    private function authenticate() {
        $headers = $this->input->request_headers();
        $authHeader = isset($headers['Authorization']) ? $headers['Authorization'] : 
                      (isset($headers['authorization']) ? $headers['authorization'] : null);

        if (!$authHeader || $authHeader !== 'Bearer ' . $this->api_token) {
            $this->output
                ->set_status_header(401)
                ->set_output(json_encode(['error' => 'Unauthorized']));
            exit;
        }
    }

    // ✅ GET: List all cars
    public function index() {
        $this->authenticate();
        $cars = $this->Car_model->get_all_cars();

        $this->output->set_output(json_encode($cars));
    }

    // ✅ POST: Add a new car
    public function create() {
        $this->authenticate();

        $input = json_decode(trim(file_get_contents("php://input")), true);

        if (!isset($input['carname'], $input['plate'], $input['color'], $input['year'], $input['status'])) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(['error' => 'Missing required fields']));
            return;
        }

        $data = [
            'mobile_carname' => $this->security->xss_clean($input['carname']),
            'mobile_plate'   => $this->security->xss_clean($input['plate']),
            'mobile_color'   => $this->security->xss_clean($input['color']),
            'mobile_year'    => (int)$input['year'],
            'mobile_status'  => (int)$input['status']
        ];

        $this->Car_model->insert_car($data);

        $this->output->set_output(json_encode(['message' => 'Car added successfully']));
    }

    // ✅ DELETE: Delete car by ID
    public function delete($id) {
        $this->authenticate();

        $car = $this->Car_model->get_car_by_id($id);
        if (!$car) {
            $this->output
                ->set_status_header(404)
                ->set_output(json_encode(['error' => 'Car not found']));
            return;
        }

        $this->Car_model->delete_car($id);

        $this->output->set_output(json_encode(['message' => 'Car deleted successfully']));
    }
}
