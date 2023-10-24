<?php

namespace App\Router;

use App\Router\Route;
use App\Logger\Logger;
use App\Router\Router_Interface;
use Controllers\Main_Controller;

class Router implements Router_Interface
{
    private array $json;
    private array $routes = [
        "message" => [],

    ];

    public function __construct($routes)
    {
        foreach ($routes as $route) {
            $this->initRoutes($route);
        }
        //dd($this->routes);
    }

    public function matched(string $token, string $data): void
    {
        if (!$data) {
            die;
        }

        $this->json = $this->decodeJson($data);
        //key message
        $method = array_keys($this->json)[1];
        //key command
        $command = $this->json[$method]["text"];
        /** @var Route $route */
        $route = $this->routes[$method][$command];

        $action = $route->getAction();
        $controller = $action[0];
        $func = $action[1];

        $chat_id = $this->json["message"]["chat"]["id"];
        //from user
        $user_id = $this->json["message"]["from"]["id"];

        $uri = $this->getUri($token, '/sendMessage?');

        $controller = new $controller();
        $controller->$func($uri, $chat_id);
    }

    private function initRoutes(Route $route): void
    {
        $this->routes[$route->getMethod()][$route->getCommand()] = $route;
    }

    private function decodeJson(string $data): array
    {
        $json = json_decode($data, true);
        Logger::writeLogFile($json);

        return $json;
    }

    private function getUri(string $token, string $method): string
    {
        //$uri = "https://api.telegram.org/bot{token}/{method}";
        $uri = "https://api.telegram.org/bot" . $token . $method;

        return $uri;
    }
}
