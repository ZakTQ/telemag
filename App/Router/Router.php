<?php

namespace App\Router;

use App\Logger\Logger;
use App\Router\Router_Interface;

class Router implements Router_Interface
{
    public readonly string $time;
    public readonly array $json;

    public readonly string $uri;

    public function __construct()
    {
        $this->time = date("Y-m-d H:i:s");
    }

    public function matched(string $token, string $method, string $data)
    {
        $this->json = $this->decodeJson($data);

        $getQuery = [
            'reply_markup' => json_encode(array(
                'keyboard' => array(
                    array(
                        array(
                            'text' => 'Тестовая кнопка 1',
                            'url' => 'YOUR BUTTON URL',
                        ),
                        array(
                            'text' => 'Тестовая кнопка 2',
                            'url' => 'YOUR BUTTON URL',
                        ),
                    )
                ),
                'one_time_keyboard' => FALSE,
                'resize_keyboard' => TRUE,
            ))
        ];

        $ch = curl_init(
            $this->getUri(
                $token,
                "/sendMessage?"
            ) . http_build_query($getQuery)
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $result = curl_exec($ch);
        echo $result;
        curl_close($ch);

        Logger::writeLogFile($this->json, $this->time);
    }

    
    private function decodeJson(string $data): array
    {
        return json_decode($data, true);
    }

    private function getUri(string $token, string $method): string
    {
        //$uri = "https://api.telegram.org/bot{token}/{method}";

        $uri = "https://api.telegram.org/bot" . $token . $method;

        return $uri;
    }

}
