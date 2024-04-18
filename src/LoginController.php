<?php

declare(strict_types=1);
include_once("./database_config/config.php");
include_once("Controller.php");

class LoginController
{
    private $dbConfig;
    private $controller;

    public function __construct()
    {
        $this->dbConfig = new Config();
        $this->controller = new Controller();
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
                    echo "Login successful";
                    // $this->controller->pageRouting("dashboard");
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
