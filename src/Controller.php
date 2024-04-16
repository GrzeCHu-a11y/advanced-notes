<?php

declare(strict_types=1);

require_once("View.php");

class Controller
{
    private View $view;

    const DEFAULT_PAGE = "home";
    const LOGIN_PAGE = "login";
    const REGISTER_PAGE = "register";

    public function __construct()
    {
        $this->view = new View();
    }

    public function run(): void
    {
        $action = $this->getAction();
        $this->pageRouting($action);

        $page = $action;
        $this->view->render($page);
    }

    public function pageRouting(string $action): string
    {
        switch ($action) {
            case self::LOGIN_PAGE:
                return self::LOGIN_PAGE;
                break;
            case self::REGISTER_PAGE:
                return self::REGISTER_PAGE;
                break;

            default:
                return self::DEFAULT_PAGE;
                break;
        }
    }

    public function getAction(): string
    {
        return !empty($_GET["action"]) ? $_GET["action"] : self::DEFAULT_PAGE;
    }
}
