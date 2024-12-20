<?php 
require_once '../config/database.php'; // Inclua o caminho correto para o arquivo database.php

class SpecialtyModel {
    private PDO $connection;

    public function __construct() {
        $this->connection = new Database(); // Usa a classe Database para conexão
    }

    public function fetchAll(): array {
        $query = "SELECT idEspecialidade, nome FROM especialidades";
        $stmt = $this->connection->query($query);
        return $stmt->fetchAll(); // Retorna todas as especialidades como array
    }
}

?>
