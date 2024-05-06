<?php

declare(strict_types=1);

if (file_exists('config/config.php')) {
    require_once 'config/config.php';
} elseif (file_exists('../config/config.php')) {
    require_once '../config/config.php';
} else {
    die('Nie można znaleźć pliku konfiguracyjnego.');
}



class QueryController
{
    private $dbConfig;
    private $controller;

    public function __construct()
    {
        $this->dbConfig = new Config();
    }

    public function handleAction(string $action): void
    {
        switch ($action) {
            case Controller::OPEN_NOTE:
                $this->openNote();
                break;

            default:
                # code...
                break;
        }
    }

    public function connect(): mysqli
    {
        $con = new mysqli(Config::$servername, Config::$username, Config::$password, Config::$database);

        if ($con->connect_error) {
            die("ERROR" . $con->connect_error);
        }

        return $con;
    }

    public function getNotes(): array
    {
        $con = $this->connect();
        $sql = $con->prepare("SELECT * FROM notes WHERE user_id = ?");
        $sql->bind_param("i", $_SESSION["id"]);
        $sql->execute();

        $result = $sql->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        return $rows;
    }

    public function sendNote(string $title, string $editorData): void
    {
        $con = $this->connect();
        $sql = $con->prepare("INSERT INTO notes (user_id, title, content) VALUES(?, ?, ?)");
        $sql->bind_param("iss", $_SESSION["id"], $title, $editorData);
        $sql->execute();

        header("Location: /?action=dashboard");
    }

    public function openNote(): array
    {
        $id = $_GET['id'];
        $con = $this->connect();
        $sql = $con->prepare("SELECT * FROM notes WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = $sql->get_result();

        $data = ["title" => "", "content" => ""];

        foreach ($result as $note) {
            $data["title"] = $note["title"];
            $data["content"] = $note["content"];
        }

        return $data;
    }
}
