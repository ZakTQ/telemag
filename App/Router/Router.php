<?php

namespace App\Router;

use App\Router\Route;
use App\Core\Http\Logmaster\LogMaster_Interface;
use App\Router\Router_Interface;
use App\Settings\Settings_Interface;
use App\Core\View\View_Interface;

class Router implements Router_Interface
{
    private int $chat_id;
    private int $chat_group_id;
    private int $user_id;
    //
    private array $json;
    private array $routes = [
        "message" => [],

    ];

    public function __construct(
        private LogMaster_Interface $logMaster,
        private Settings_Interface $settings,
        private View_Interface $view,
    ) {
        $this->initRoutes();
    }

    public function matched(string $data): void
    {
        $this->json = json_decode($data, true);
        $this->logMaster->save(__CLASS__, $this->json);

        $route = $this->selectRoute();
        $this->runController($route);
    }

    private function initRoutes(): void
    {
        $routes = $this->settings->getRoutes();
        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getCommand()] = $route;
        }
    }

    private function selectRoute(): object
    {
        $incomming = array_keys($this->json)[1];
        $command = $this->json[$incomming]["text"];

        $this->chat_id = $this->json[$incomming]["chat"]["id"];
        $this->user_id = $this->json[$incomming]["from"]["id"];

        /** @var Route $route */
        $route = isset($this->routes[$incomming][$command]) ? $this->routes[$incomming][$command] : die;
        return $route;
    }

    private function runController(Route $route): void
    {
        [$controller, $action] = $route->getAction();

        $controller = new $controller();

        call_user_func([$controller, 'setLogMaster'], $this->logMaster);
        call_user_func([$controller, 'setSettings'], $this->settings);
        call_user_func([$controller, 'setView'], $this->view);

        call_user_func([$controller, $action], $this->chat_id);
    }
}

        /*
            старт программы
            провекра метода
            проверка данных
            проверка джейсона
            запись джоса в лог

            получаю комманду.
            проверяю комманду.
            обрабатываю
            у комманд должна быть проверка авторизации

            проверка файлов контроллера???
            создание контроллера установка передача парраметров
            рендеринг запроса во вью+курл
            отправка
            конец

        */