<?php
require_once __DIR__ . '/../config/database.php';

class PacienteModel
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    // Método para registrar um novo paciente
    public function register ($data) {

        $stmt = $this->connection->prepare("INSERT INTO pacientes (nome, sobrenome, email, historico, telefone, cpf)
                                    VALUES (:nome, :sobrenome, :email, :historico, :telefone,:cpf)");
        $stmt->execute($data);
    }
}
