<?php

namespace App\Container;

use App\Core\Http\Logmaster\LogMaster;
use App\Core\Http\Logmaster\LogMaster_Interface;
use App\Core\View\View;
use App\Core\View\View_Interface;
use App\Core\Http\Request\Request;
use App\Core\Http\Request\Request_Interface;
use App\Router\Router;
use App\Router\Router_Interface;
use App\Settings\Settings;
use App\Settings\Settings_Interface;

class Container
{
    public readonly LogMaster_Interface $logMaster;
    public readonly Request_Interface $request;
    public readonly Settings_Interface $settings;
    public readonly View_Interface $view;
    public readonly Router_Interface $router;


    public function __construct()
    {
        $this->initServices();
    }

    private function initServices()
    {
        $this->logMaster = new LogMaster();
        $this->request = new Request();
        $this->settings = new Settings();
        $this->view = new View();
        $this->router = new Router(
            $this->logMaster,
            $this->settings,
            $this->view,
        );
    }
}
