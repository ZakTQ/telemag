<?php

use App\Router\Route;
use Controllers\Main_Controller;

return [

    Route::message("/start", [Main_Controller::class, 'start']),
    Route::message("/start22", [Main_Controller::class, 'start']),
    Route::message("/start33", [Main_Controller::class, 'start']),

];
