<?php

declare(strict_types=1);

class View
{


    public function render(string $page)
    {
        require_once("layout.php");
    }
}
