<?php

namespace App\Container;

use App\Router\Router;
use App\Router\Router_Interface;
use App\Settings\Settings;
use App\Settings\Settings_Interface;

class Container
{
    public readonly Router_Interface $router;
    public readonly Settings_Interface $settings;

    public function __construct()
    {
        $this->initServices();
    }

    private function initServices()
    {
        $this->settings = new Settings();
        $this->router = new Router();
    }
}
