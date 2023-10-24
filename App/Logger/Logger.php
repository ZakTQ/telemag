<?php

namespace App\Logger;

class Logger
{

    public static function writeLogFile($json, string $time)
    {
        $log_file_name = APP_PATH . DIRECTORY_SEPARATOR . "log" . DIRECTORY_SEPARATOR . "message.txt";
        file_put_contents($log_file_name, '');
        file_put_contents($log_file_name, $time . " " . print_r($json, true) . PHP_EOL, FILE_APPEND);
    }
    
}
