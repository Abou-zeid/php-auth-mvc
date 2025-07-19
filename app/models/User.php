<?php

require_once __DIR__ . "/../../config/database.php";

class User {
    private $conn;
    private $table = "users";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function register($name, $email, $password, $status) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO " . $this->table . " (name, email, password, status) VALUES (:name, :email, :password, :status)";
        
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword, 'status' => $status]);
    }

    public function login($email, $password) {

        $query = "SELECT * FROM " . $this->table . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
       
        if ($user && password_verify($password, $user['password']) ) {
            return $user;
        }else{
            return false;
        }
    }

    public function setResetToken($email, $token) {
        $expires = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token valid for 1 hour
        $query = "UPDATE " . $this->table . " SET reset_token = :token, reset_expires = :expires WHERE email = :email";
        $stmt = $this->conn->prepare($query);

        $stmt->execute(['token' => $token, 'expires' => $expires, 'email' => $email]);
        return $stmt->rowCount();

    }

    public function getUserByToken($token) {
        $query = "SELECT * FROM " . $this->table . " WHERE reset_token = :token LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['token' => $token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePassword($token, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $query = "UPDATE " . $this->table . " SET password = :password, reset_token = NULL WHERE reset_token = :token AND reset_expires > NOW()";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['password' => $hashedPassword, 'token' => $token]);
        return $stmt->rowCount();
    }

}

?>
