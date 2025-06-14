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

        // Format to match Postman tests
        $formatted = array_map(function($car) {
            return [
                'id' => (string) $car->mobile_id,
                'make' => explode(' ', $car->mobile_carname)[0],
                'model' => explode(' ', $car->mobile_carname)[1] ?? '',
                'year' => (int) $car->mobile_year,
                'price' => isset($car->mobile_price) ? (float) $car->mobile_price : 0,
                'availability' => $car->mobile_status == 1
            ];
        }, $cars);

        $this->output->set_output(json_encode($formatted));
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
