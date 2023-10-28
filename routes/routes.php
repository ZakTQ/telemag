<?php

use App\Router\Route;
use Controllers\Main_Controller;
use Controllers\Weather_Controller;

return [
    Route::message("/start", [Main_Controller::class, 'start']),
    Route::message("/weather", [Weather_Controller::class, 'start']),
];
