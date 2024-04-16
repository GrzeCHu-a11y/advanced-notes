<?php

declare(strict_types=1);

require_once("View.php");

class Controller
{
    private View $view;
    const DEFAULT_PAGE = "home";

    public function __construct()
    {
        $this->view = new View();
    }

    public function run()
    {
        switch ($this->getParams()) {
            case 'login':
                $page = "login";
                $this->view->render($page);
                break;
            case 'register':
                $page = "register";
                $this->view->render($page);
                break;

            default:
                $page = self::DEFAULT_PAGE;
                $this->view->render($page);
                break;
        }
    }

    public function getParams()
    {
        if (!empty($_GET)) {
            $action = $_GET["action"];
            return $action;
        } else return self::DEFAULT_PAGE;
    }
}
