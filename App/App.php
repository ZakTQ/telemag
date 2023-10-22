<?php

namespace App;
use App\Container\Container;

class App
{
    public Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function run()
    {
        /** @var Container  $this->container */
        $this->container->router->matched(
            $this->container->settings->getToken(),
            $this->container->settings->getBotId(),
            $this->container->settings->getBotName()
        );
    }
}
