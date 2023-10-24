<?php

namespace App\Router;

interface Router_Interface
{
    public function matched(string $token, string $data);
}
