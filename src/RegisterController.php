<?php

declare(strict_types=1);

class RegisterController
{
    public function handleRegister()
    {
        echo $_POST["email"];
    }
}
