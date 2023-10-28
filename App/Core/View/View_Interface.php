<?php

namespace App\Core\View;

interface View_Interface
{
    public function sendMessage(string $uri, $getQuery);
    public function weather(string $uri, $getQuery);
}
