<?php

require_once '../config/database.php'; 

class UserModel {

    private $db;

    public function __construct() {
        // try {
        //     $this->db = new Database();
        // } catch (PDOException $e) {
        //     die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
        // }
    }

    // Método para registrar um novo usuário
    public function register ($data) {

        echo 'registrado';
        // $query = "INSERT INTO users (name, email, password, created_at) VALUES (:name, :email, :password, NOW())";

        // try {
        //     $stmt = $this->db->prepare($query);
        //     $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
        //     $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        //     $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
        //     $stmt->execute();

        //     return [
        //         'success' => true,
        //         'message' => 'Usuário registrado com sucesso!'
        //     ];
        // } catch (PDOException $e) {
        //     // Retornar erro caso algo dê errado
        //     return [
        //         'success' => false,
        //         'error' => $e->getMessage()
        //     ];
        // }
    }

    // Método para verificar se um email já está registrado
    public function isEmailRegistered($email) {
        $query = "SELECT id FROM users WHERE email = :email";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Método para autenticar um usuário
    public function authenticateUser($email, $password) {
        $query = "SELECT id, name, password FROM users WHERE email = :email";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                return [
                    'success' => true,
                    'user' => [
                        'id' => $user['id'],
                        'name' => $user['name']
                    ]
                ];
            }

            return [
                'success' => false,
                'message' => 'Credenciais inválidas!'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}
