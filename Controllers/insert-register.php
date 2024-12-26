<?php
require_once '../config/database.php';

header('Content-Type: application/json');

try {
    // Obtém os dados enviados
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['name'], $data['price'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid data']);
        exit;
    }

    $name = $data['name'];
    $price = $data['price'];

    // Conexão com o banco de dados
    $db = new Database();
    $stmt = $db->prepare("INSERT INTO servicos (nome, preco) VALUES (:name, :price)");
    $stmt->execute([
        ':name' => $name,
        ':price' => $price,
    ]);

    echo json_encode(['success' => true, 'message' => 'Service added successfully']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
