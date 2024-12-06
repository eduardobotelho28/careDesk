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

        unset($data['lastname'])        ;
        unset($data['confirm-password']);

        $stmt = $this->db->prepare("INSERT INTO users (nome, email, senha, cpf)
                                    VALUES (:firstname, :email, :password, :cpf)");
        $stmt->execute($data);
    }

    public function login () {

    }

}
