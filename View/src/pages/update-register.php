<?php
require_once '../../../config/database.php';

header('Content-Type: application/json');

try {
    // Obtém os dados enviados
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['id'], $data['name'], $data['price'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid data']);
        exit;
    }

    $id = $data['id'];
    $name = $data['name'];
    $price = $data['price'];

    // Conexão com o banco de dados
    $db = new Database();
    $stmt = $db->prepare("UPDATE servicos SET nome = :name, preco = :price WHERE idServico = :id");
    $stmt->execute([
        ':name' => $name,
        ':price' => $price,
        ':id' => $id,
    ]);

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

