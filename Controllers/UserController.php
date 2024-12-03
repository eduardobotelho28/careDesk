<?php
// require_once '../models/UserModel.php';

// if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//     die('acesso proibido');
// }

$controller = new UserController();
$controller->processRequest();
// print_r($_POST); exit; 

class UserController {

    public function processRequest() {

        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'POST':
                # code...
                break;
            
            default:
                # code...
                break;
        }

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
}
