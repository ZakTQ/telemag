<?php

namespace App\Core\Http\Request;

interface Request_Interface
{
    public function getMethod(): string;
    public function getUri(): string;
    public function getData(): string;
}
