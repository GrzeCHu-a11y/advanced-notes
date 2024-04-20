<?php

declare(strict_types=1);
include_once("./database_config/config.php");

session_start();

class LoginController
{
    private $dbConfig;

    public function __construct()
    {
        $this->dbConfig = new Config();
    }

    public function handleLogin(array $data)
    {
        $con = new mysqli(Config::$servername, Config::$username, Config::$password, Config::$database);

        if ($con->connect_error) {
            die("error" . $con->connect_error);
        }

        $sql = $con->prepare("SELECT * FROM users WHERE email = ?");
        $sql->bind_param("s", $data["email"]);

        if ($sql->execute()) {
            $result = $sql->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $storedPasswordHash = $row["password"];
                $passwordFromForm = $data["password"];

                if (password_verify($passwordFromForm, $storedPasswordHash)) {

                    $_SESSION["username"] = $row["username"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["id"] = $row["id"];

                    header("Location: /pages/dashboard.php");

                    exit();
                } else {
                    echo "Error: Incorrect password";
                }
            } else {
                echo "Error: User not found";
            }
        } else {
            echo "Error: Unable to execute SQL query";
        }

        $con->close();
    }
}
