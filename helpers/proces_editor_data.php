<?php

declare(strict_types=1);
require_once("../database_config/config.php");

session_start();

class ProcesEditorData
{
    private $dbConfig;

    public function __construct()
    {
        $this->dbConfig = new Config();
        $this->procesData();
    }

    private function procesData(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $editorData = $_POST["editorData"];
            $title = $_POST["noteTitle"];

            $con = new mysqli(Config::$servername, Config::$username, Config::$password, Config::$database);

            if ($con->connect_error) {
                die("error" . $con->connect_error);
            } else echo "con succes";

            $sql = $con->prepare("INSERT INTO notes (user_id, title, content) VALUES(?, ?, ?)");
            $sql->bind_param("iss", $_SESSION["id"], $title, $editorData);
            $sql->execute();

            header("Location: /?action=dashboard");
        }
    }
}

$procesEditorData = new ProcesEditorData();
