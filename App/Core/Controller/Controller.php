<?php

namespace App\Core\Controller;

use App\Core\Http\Logmaster\LogMaster_Interface;
use App\Core\View\View_Interface;
use App\Settings\Settings_Interface;

abstract class Controller
{
    private LogMaster_Interface $logMaster;
    private View_Interface $view;
    private Settings_Interface $settings;

    //private DatabaseInterface $database;
    //private AuthInterface $auth;

    public function __construct()
    {
    }

    public function setView(View_Interface $view): void
    {
        $this->view = $view;
    }

    public function setSettings(Settings_Interface $settings): void
    {
        $this->settings = $settings;
    }

    public function setLogMaster(LogMaster_Interface $logMaster): void
    {
        $this->logMaster = $logMaster;
    }

    public function getUri(string $method): string
    {
        //$uri = "https://api.telegram.org/bot{token}/{method}";
        $uri = "https://api.telegram.org/bot" . $this->settings->getToken() . $method;

        return $uri;
    }

    public function view(): View_Interface
    {
        return $this->view;
    }

    public function settings(): Settings_Interface
    {
        return $this->settings;
    }

    public function logMaster(): LogMaster_Interface
    {
        return $this->logMaster;
    }
}
