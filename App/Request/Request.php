<?php

namespace App\Request;

use App\Request\Request_Interface;

class Request implements Request_Interface
{
    private string $method;
    private string $uri;
    private string $data;

    // private array $_SERVER;
    // private array $_FILES;
    // private array $_GET;
    // private array $_POST;
    // private array $_COOKIE;
    // private array $_SESSION;

    public function __construct()
    {
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->uri = $_SERVER["REQUEST_URI"];

        $this->data = $this->inputData();
    }

    private function inputData(): string
    {
        $data = file_get_contents('php://input');
        return $data;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getData(): string
    {
        return $this->data;
    }
}
