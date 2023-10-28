<?php

namespace App\Core\Http\Logmaster;

use  App\Core\Http\Logmaster\LogMaster_Interface;

class LogMaster implements LogMaster_Interface
{
    private readonly string $time;

    public function __construct()
    {
        $this->time = $this->getTime();
    }

    private function getTime(): string
    {
        // 2001-03-10 17:16:18 (формат MySQL DATETIME)
        $time = date("Y-m-d_H-i-s");
        return $time;
    }

    public function save(string $class, array $data): void
    {
        $log_file = basename($class) . "_log.json";
        $log_dir = APP_PATH . DIRECTORY_SEPARATOR . "log" . DIRECTORY_SEPARATOR . $log_file;
        file_put_contents($log_dir, '');
        file_put_contents($log_dir, json_encode($data));
    }
}
