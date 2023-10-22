<?php

namespace App\Router;

use App\Router\Router_Interface;

class Router implements Router_Interface
{
    public readonly string $time;
    public readonly string $data;
    public readonly array $json;

    public function __construct()
    {
        $this->time = date("Y-m-d H:i:s");
        $this->data = $this->getData();
        if ($this->data) {
            $this->json = $this->decodeJson($this->data);
        } else {
            die;
        }
    }

    public function matched(string $token, int $bot_id, string $bot_name)
    {
        $this->writeLogFile($this->json, $this->time);
    }

    private function getData(): string
    {
        $data = file_get_contents('php://input');
        return $data;
    }

    private function decodeJson(string $data): array
    {
        return json_decode($data, true);
    }

    private function writeLogFile($string, string $time)
    {
        $log_file_name = APP_PATH . DIRECTORY_SEPARATOR . "log" . DIRECTORY_SEPARATOR . "message.txt";
        file_put_contents($log_file_name, '');
        file_put_contents($log_file_name, $time . " " . print_r($string, true) . PHP_EOL, FILE_APPEND);
    }
}
