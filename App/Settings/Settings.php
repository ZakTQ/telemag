<?php

namespace App\Settings;

use App\Settings\Settings_Interface;

class Settings implements Settings_Interface
{
    private string $token;
    private string $bot_name;
    private int $bot_id;
    private array $config;

    public function __construct()
    {
        $this->config = require_once APP_PATH . DIRECTORY_SEPARATOR  . "env.php";
        $this->bot_name = $this->config["bot_name"];
        $this->bot_id = $this->config["bot_id"];
        $this->token = $this->config["token"];
    }

    public function getBotName(): string
    {
        return $this->bot_name;
    }

    public function getBotId(): int
    {
        return $this->bot_id;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
