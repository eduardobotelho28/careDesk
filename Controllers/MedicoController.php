<?php
require_once '../Models/DoctorModel.php';

header('Content-Type: application/json; charset=utf-8');

$controller = new MedicoController();
$controller->processRequest();

class MedicoController {

    public $model;

    public function __construct() {
        $this->model = new DoctorModel();
    }

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

        $this->valid_method('POST');
        
        $data   = $_POST;
        $data   = $this->sanitize_data($data);
        $errors = $this->valid_input_data($data);

        if(!empty($errors)) {
            http_response_code(400);
            echo json_encode(['success' => 'false', 'errors' => $errors]);
            exit;
        }

        $this->model->register($data);

        echo json_encode(array('success' => 'true')); exit;

    }

    private function valid_input_data ($data) {
        $errors = [];

        //verifica se algum campo do formulário veio vazio (atualmente, todos os campos são obrigatórios)
        foreach ($data as $key => $value) {
            if($value == '' || $value == null) {
                $errors[] = "Campo $key é obrigatório";
            }
        }

        //valida email 
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Digite um email válido.';
        }

        return $errors;
    }

    function sanitize_data($data) {
        $sanitized = [];

        foreach ($data as $key => $value) {
            if (is_string($value)) {
                // Remove espaços em excesso no início/fim e caracteres HTML especiais
                $sanitized[$key] = htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
            } elseif (is_numeric($value)) {
                // Garante que números fiquem no formato correto
                $sanitized[$key] = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            } else {
                // Para outros tipos de dados, mantém o valor como está
                $sanitized[$key] = $value;
            }
        }

        return $sanitized;
    }

    function valid_method ($method) {
        if($_SERVER['REQUEST_METHOD'] != $method)  {
            die(json_encode('nao permitido'));
        }
    }
    

}
