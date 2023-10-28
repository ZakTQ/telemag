<?php

namespace App\Core\View;

use App\Core\View\View_Interface;

class View implements View_Interface
{

    public function __construct()
    {
    }

    public function sendMessage(string $uri, $getQuery)
    {
        $ch = curl_init($uri . http_build_query($getQuery));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $result = curl_exec($ch);

        print_r($result);
        curl_close($ch);
    }

    public function weather(string $uri, $getQuery)
    {
        $ch = curl_init($uri . http_build_query($getQuery));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $result = curl_exec($ch);
        
        print_r($result);
        curl_close($ch);
    }
}
