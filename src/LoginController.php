<?php

declare(strict_types=1);

class LoginController
{
    public function handleLogin()
    {
        echo $_POST["email"];
    }
}
