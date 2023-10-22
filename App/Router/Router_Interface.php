<?php

namespace App\Router;

interface Router_Interface
{
    public function matched(string $token,int $bot_id,string $bot_name);
}
