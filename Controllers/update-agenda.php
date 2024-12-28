<?php
require_once '../config/database.php';

header('Content-Type: application/json');

try {
    // Obtém os dados enviados
    $data = json_decode(file_get_contents('php://input'), true);

    if (empty($data['id']) || empty($data['dataHora']) || empty($data['status']) || empty($data['pacienteNome']) || empty($data['medicoNome'])) {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        exit;
    }

    $id = $data['id'];
    $dataHora = date('Y-m-d H:i:s', strtotime($data['dataHora'])); // Formatar dataHora corretamente
    $status = $data['status'];
    $pacienteNome = $data['pacienteNome'];
    $medicoNome = $data['medicoNome'];

    // Conexão com o banco de dados
    $db = new Database();
    $stmt = $db->prepare("
        UPDATE consultas 
        SET dataHora = :dataHora, 
            status = :status, 
            pacientes_idPaciente = (SELECT idPaciente FROM pacientes WHERE nome = :pacienteNome),
            medicos_idMedicos = (SELECT idMedicos FROM medicos WHERE nome = :medicoNome)
        WHERE idConsultas = :id
    ");
    $stmt->execute([
        ':dataHora' => $dataHora,
        ':status' => $status,
        ':pacienteNome' => $pacienteNome,
        ':medicoNome' => $medicoNome,
        ':id' => $id,
    ]);

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Database error occurred.']);
}
