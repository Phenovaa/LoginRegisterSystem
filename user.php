<?php

require_once 'db.php';

class User extends DB {
    public function createUser($first_name, $last_name, $username, $password, $email, $phone_number) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO users (first_name, last_name, username, password, email, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$first_name, $last_name, $username, $hashedPassword, $email, $phone_number]);
    }

    public function getUserByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyUser($username, $password) {
        $user = $this->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            return true;
        }

        return false;
    }
}
?>
