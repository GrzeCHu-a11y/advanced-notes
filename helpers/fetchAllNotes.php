<?php

declare(strict_types=1);
require_once("database_config/config.php");

class FetchAllNotes
{
    private $dbConfig;

    public function __construct()
    {
        $this->dbConfig = new Config();
    }

    public function getAllNotes(): array
    {
        $con = new mysqli(Config::$servername, Config::$username, Config::$password, Config::$database);

        if ($con->connect_error) {
            die("error" . "" . $con->connect_error);
        }

        $sql = $con->prepare("SELECT * FROM notes WHERE user_id = ?");
        $sql->bind_param("i", $_SESSION["id"]);
        $sql->execute();

        $result = $sql->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        return $rows;
    }
}
