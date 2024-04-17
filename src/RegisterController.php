<?php

declare(strict_types=1);
require_once("database_config/config.php");

class RegisterController
{
    private $dbConfig;

    public function __construct()
    {
        $this->dbConfig = new Config();
    }

    public function handleRegister(string $email, string $password, string $username)
    {
        $conn = new mysqli(Config::$servername, Config::$username, Config::$password, Config::$database);

        if ($conn->connect_error) {
            die("Connection Failed:" . $conn->connect_error);
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = $conn->prepare("INSERT INTO users (email, password, username) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $email, $hashedPassword, $username);

        if ($sql->execute()) {
            echo "User Created";
        } else echo "error" . $sql->error;

        $conn->close();
    }
}
