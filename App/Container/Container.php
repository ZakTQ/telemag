<?php

namespace App\Container;

use App\Request\Request;
use App\Request\Request_Interface;
use App\Router\Router;
use App\Router\Router_Interface;
use App\Settings\Settings;
use App\Settings\Settings_Interface;

class Container
{
    public readonly Request_Interface $request;
    public readonly Settings_Interface $settings;
    public readonly Router_Interface $router;


    public function __construct()
    {
        $this->initServices();
    }

    private function initServices()
    {
        $this->request = new Request();
        $this->settings = new Settings();
        $this->router = new Router();
    }
}
