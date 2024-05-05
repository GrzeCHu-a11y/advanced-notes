<?php

declare(strict_types=1);
require_once("QueryController.php");

class RegisterController
{
    private $query;

    public function __construct()
    {
        $this->query = new QueryController();
    }

    public function handleRegister(array $data)
    {
        $conn = $this->query->connect();

        $email = $data["email"];

        $sql = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {

            echo "user alredy exist";
        } else {

            $hashedPassword = password_hash($data["password"], PASSWORD_DEFAULT);
            $sql = $conn->prepare("INSERT INTO users (email, password, username) VALUES (?, ?, ?)");
            $sql->bind_param("sss", $data["email"], $hashedPassword, $data["username"]);

            if ($sql->execute()) {
                echo "User Created";
            } else echo "error" . $sql->error;
        }

        $conn->close();
    }
}
