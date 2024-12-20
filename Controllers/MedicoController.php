<?php
// require_once '../Models/UserModel.php';

header('Content-Type: application/json; charset=utf-8');

$controller = new MedicoController();
$controller->processRequest();

class MedicoController {

    // public $model;

    // public function __construct() {
    //     $this->model = new UserModel();
    // }

    //método que faz o roteamento
    public function processRequest() {

        $action = $_GET['action'];

        switch ($action) {
            case 'register':
                $this->register();
                break;
            
            default:
                http_response_code(404);
                die(json_encode('ação não existente no controoler'));
                break;
        }

    }
    public function getSpecialties() {
        include_once '../Models/SpecialtyModel.php';
        $specialtyModel = new SpecialtyModel();
        $specialties = $specialtyModel->fetchAll();

        // Retorna as especialidades como JSON
        header('Content-Type: application/json');
        echo json_encode($specialties);
    }

    private function register () {

    }

    private function valid_input_data ($data) {

    }

    function sanitize_data($data) {
    }

    function valid_method ($method) {
        if($_SERVER['REQUEST_METHOD'] != $method)  {
            die(json_encode('nao permitido'));
        }
    }
    

}
