<?php

declare(strict_types=1);

require_once("View.php");
require_once("QueryController.php");


class Controller
{
    private View $view;

    const DEFAULT_PAGE = "home";
    const LOGIN_PAGE = "login";
    const REGISTER_PAGE = "register";
    const DASHBOARD_PAGE = "dashboard";
    const CREATE_NOTE = "createdoc";
    const OPEN_NOTE = "openNote";
    const DELETE_NOTE = "deleteNote";
    const UPDATE_NOTE = "updateNote";


    public function __construct()
    {
        $this->view = new View();
    }

    public function run(): void
    {
        $action = $this->getAction();
        $page = $this->pageRouting($action);

        if (in_array($action, [self::DELETE_NOTE, self::UPDATE_NOTE])) {
            $queryController = new QueryController();
            $queryController->handleAction($action);
        } else

            $this->view->render($page);
    }

    public function pageRouting(string $action): string
    {
        switch ($action) {
            case self::LOGIN_PAGE:
            case self::REGISTER_PAGE:
            case self::DASHBOARD_PAGE:
            case self::CREATE_NOTE:
            case self::OPEN_NOTE:
                return $action;
                break;
            case self::DELETE_NOTE:
            case self::UPDATE_NOTE:
                return self::DASHBOARD_PAGE;
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
