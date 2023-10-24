<?php

define("APP_PATH", dirname(__DIR__));

spl_autoload_register("autoload");

use App\App;

$app = new App();
$app->run();

function autoload($class)
{
    $path = APP_PATH . DIRECTORY_SEPARATOR  . $class . ".php";
    $path = str_replace("\\", "/", $path);
    require_once $path;
}

function dd($item)
{
    echo "<pre>";
    var_dump($item);
    echo "</pre>";
    die();
}
