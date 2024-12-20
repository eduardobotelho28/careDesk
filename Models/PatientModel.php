<?php

require_once __DIR__ . '/../config/database.php';

class PatientModel extends Database
{
    public function getAllPatients(): array
    {
        $query = "SELECT idPaciente, nome, sobrenome, telefone, email, cpf FROM pacientes";
        $stmt = $this->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
