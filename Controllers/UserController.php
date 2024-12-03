<?php
// require_once '../models/UserModel.php';

$controller = new UserController();
$controller->processRequest();

class UserController {

    public $model;

    public function __construct() {
        // $this->model = new UserModel();
    }

    //método que faz o roteamento
    public function processRequest() {

        $action = $_GET['action'];

        switch ($action) {
            case 'register':
                $this->register();
                break;

            case 'login':
                # code...
                break;
            
            default:
                http_response_code(404);
                die(json_encode('ação não existente no controoler'));
                break;
        }

    }

    private function register () {
        $errors = $this->valid_input_data($_POST);
        if(!empty($errors)) {
            http_response_code(400);
            echo json_encode(['success' => false, 'errors' => $errors]);
        }
    }

    private function valid_input_data ($data) {
        $errors = [];

        //verifica se algum campo do formulário veio vazio (atualmente, todos os campos são obrigatórios)
        foreach ($data as $key => $value) {
            if($value == '' || $value == null) {
                $errors[] = "Campo $key é obrigatório";
            }
        }

        return $errors;

    }

        // switch ($method) {
        //     case 'POST':
        //         # code...
        //         break;
            
        //     default:
        //         # code...
        //         break;
        // }

        // $name = $_POST['name'] ?? '';
        // $email = $_POST['email'] ?? '';
        // $password = $_POST['password'] ?? '';

        // if (empty($name) || empty($email) || empty($password)) {
        //     echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        //     return;
        // }

        // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        // $model = new UserModel();
        // $result = $model->createUser($name, $email, $hashedPassword);

        // if ($result) {
        //     echo json_encode(['success' => true]);
        // } else {
        //     echo json_encode(['success' => false, 'message' => 'Failed to register user.']);
        // }
    
}
