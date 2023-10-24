<?php

namespace App\Router;

class Route
{
    public function __construct(
        public string $command,
        public array $action,
        public string $method,
    ) {
    }

    public static function message(string $command, array $action = []): static
    {
        return new static($command, $action, "message");
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getAction(): array
    {
        return $this->action;
    }

    public function getCommand(): string
    {
        return $this->command;
    }
}
