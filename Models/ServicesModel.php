<?php
require_once __DIR__ . '/../config/database.php';

class ServiceModel
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function getAllServices(): array
    {
        $query = "SELECT idServico, nome, preco FROM servicos";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function addService($name, $price) {
        $sql = "INSERT INTO servicos (nome, preco) VALUES (:name, :price)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['name' => $name, 'price' => $price]);
    }

}
