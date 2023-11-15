<?php

class DB {
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'root';
    private $database = 'LoginRegisterSystem';

    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
?>
