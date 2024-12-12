<?php

require_once '../config/database.php'; 

class UserModel {

    private $db;

    public function __construct() {
        try {
            $this->db = new Database();
        } catch (PDOException $e) {
            die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
        }
    }

    // Método para registrar um novo usuário
    public function register ($data) {

        unset($data['confirm-password']);

        $stmt = $this->db->prepare("INSERT INTO users (nome, sobrenome, email, senha, cpf)
                                    VALUES (:firstname, :lastname, :email, :password, :cpf)");
        $stmt->execute($data);
    }

    public function findByCPF($cpf) {
        $query = "SELECT * FROM users WHERE cpf = :cpf LIMIT 1";
    
        $stmt = $this->db->prepare($query); 
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

}
