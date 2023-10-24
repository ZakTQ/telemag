<?php

namespace App\Request;

interface Request_Interface
{
    public function getMethod(): string;
    public function getUri(): string;
    public function getData(): string;
}
