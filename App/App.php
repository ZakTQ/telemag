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
        $method = $this->container->request->getMethod();
        if ($method === "POST") {
            $this->container->router->matched(
                $this->container->settings->getToken(),
                $this->container->request->getData(),
            );
        } else {
            die;
        }
    }
}
