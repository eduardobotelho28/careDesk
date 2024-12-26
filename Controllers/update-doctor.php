<?php
require_once '../config/database.php';

header('Content-Type: application/json');

try {
    // Obtém os dados enviados
    $data = json_decode(file_get_contents('php://input'), true);

    if (empty($data['id']) || empty($data['name']) || empty($data["lastname"]) || empty($data['crm']) || empty($data['phone']) || empty($data['email'])) {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        exit;
    }
    

    $id = $data['id'];
    $name = $data['name'];
    $lastname = $data['lastname'];
    $crm = $data['crm'];
    $phone = $data['phone'];
    $email = $data['email'];

    // Conexão com o banco de dados
    $db = new Database();
    $stmt = $db->prepare("UPDATE medicos SET nome = :name, sobrenome = :lastname, crm = :crm, telefone = :phone, email = :email  WHERE idMedicos = :id");
    $stmt->execute([
        ':name' => $name,
        ':lastname' => $lastname,
        ':crm' => $crm,
        ':phone' => $phone,
        ':email' => $email,
        ':id' => $id,
    ]);

    echo json_encode(['success' => true]);
}catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Database error occurred.']);
}

