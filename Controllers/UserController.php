<?php
require_once '../Models/UserModel.php';

header('Content-Type: application/json; charset=utf-8');

$controller = new UserController();
$controller->processRequest();

class UserController {

    public $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    //método que faz o roteamento
    public function processRequest() {

        $action = $_GET['action'];

        switch ($action) {
            case 'register':
                $this->register();
                break;

            case 'login':
                $this->login();
                break;
            
            default:
                http_response_code(404);
                die(json_encode('ação não existente no controoler'));
                break;
        }

    }

    private function register () {

        $data = $_POST;

        $data = $this->sanitize_data($data);

        $errors = $this->valid_input_data($data);

        if(!empty($errors)) {
            http_response_code(400);
            echo json_encode(['success' => 'false', 'errors' => $errors]);
            exit;
        }

        $this->model->register($data);
    }

    private function login () {

    }

    private function valid_input_data ($data) {
        $errors = [];

        //verifica se algum campo do formulário veio vazio (atualmente, todos os campos são obrigatórios)
        foreach ($data as $key => $value) {
            if($value == '' || $value == null) {
                $errors[] = "Campo $key é obrigatório";
            }
        }

        //verifica se o campo "senha" e o campo "confirmar senha" são iguais
        if(!empty($data['password']) && !empty($data['confirm-password'])) {
            if($data['password'] != $data['confirm-password']) {
                $errors[] = "As senhas não batem";
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
    

}
