<?php
require_once __DIR__ . '/../config/database.php';

class DoctorModel
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function getDoctors(): array
    {
        $query = "SELECT idMedicos, nome, sobrenome, telefone, email, crm FROM medicos";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
