<?php

class Database extends PDO
{
    private string $hostname = "127.0.0.1";
    private string $username = "root";
    private string $password = "";
    private string $database = "careDesk";

    public function __construct()
    {
        $dsn = "mysql:host={$this->hostname};dbname={$this->database}";

        try {
            parent::__construct($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die("Error connecting to the database. Please try again later.");
        }
    }
}
