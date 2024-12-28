<?php
require_once __DIR__ . '/../config/database.php';

class ConsultationModel
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    // Método para buscar todas as consultas
    public function getConsultations(): array
    {
        $query = "
            SELECT c.idConsultas, c.dataHora, c.status, 
                   p.nome AS paciente_nome, 
                   m.nome AS medico_nome, 
                   u.nome AS usuario_nome
            FROM consultas c
            JOIN pacientes p ON c.pacientes_idPaciente = p.idPaciente
            JOIN medicos m ON c.medicos_idMedicos = m.idMedicos
            JOIN users u ON c.users_idUsers = u.idUsers
        ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Depuração
        error_log(print_r($result, true));
    
        return $result;
    }
    
    

    // Método para registrar uma nova consulta
    public function register($data): void
    {
        $stmt = $this->connection->prepare("
            INSERT INTO consultas (dataHora, status, pacientes_idPaciente, medicos_idMedicos, users_idUsers) 
            VALUES (:dataHora, :status, :paciente, :medico, :usuario)
        ");
        $stmt->execute([
            ':dataHora' => $data['dataHora'],
            ':status' => $data['status'],
            ':paciente' => $data['pacientes_idPaciente'],
            ':medico' => $data['medicos_idMedicos'],
            ':usuario' => $data['users_idUsers']
        ]);
    }

    // Método para buscar uma consulta pelo ID
    public function fetchById(int $id): ?array
    {
        $query = "
            SELECT idConsultas, dataHora, status, 
                   nome AS paciente, nome AS medico, nome AS usuario
            FROM consultas 
            JOIN pacientes ON consultas.pacientes_idPaciente = pacientes.idPaciente
            JOIN medicos ON consultas.medicos_idMedicos = medicos.idMedicos
            JOIN users ON consultas.users_idUsers = users.idUsers
            WHERE idConsultas = :id
        ";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    // Método para atualizar uma consulta existente
    public function update(array $data): void
    {
        $stmt = $this->connection->prepare("
            UPDATE consultas 
            SET dataHora = :dataHora, status = :status, 
                pacientes_idPaciente = :paciente, 
                medicos_idMedicos = :medico, 
                users_idUsers = :usuario 
            WHERE idConsultas = :id
        ");
        $stmt->execute([
            ':dataHora' => $data['dataHora'],
            ':status' => $data['status'],
            ':paciente' => $data['pacientes_idPaciente'],
            ':medico' => $data['medicos_idMedicos'],
            ':usuario' => $data['users_idUsers'],
            ':id' => $data['idConsultas']
        ]);
    }

    // Método para excluir uma consulta
    public function delete(int $id): void
    {
        $stmt = $this->connection->prepare("DELETE FROM consultas WHERE idConsultas = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}

