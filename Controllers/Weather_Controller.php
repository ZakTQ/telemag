<?php

namespace Controllers;

use App\Core\Controller\Controller;

class Weather_Controller extends Controller
{

    public function start($chat_id)
    {
        
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://weatherapi-com.p.rapidapi.com/forecast.json?q=Moscow&days=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: weatherapi-com.p.rapidapi.com",
                "X-RapidAPI-Key: 2a230d65damshe56810f87205361p1a4316jsneee32746a4a5"
            ],
        ]);

        $response = curl_exec($curl);

        // $err = curl_error($curl);
        // curl_close($curl);
        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     echo $response;
        // }

        curl_close($curl);

        $data = json_decode($response, true);

        $this->logMaster()->save(__CLASS__, $data);

        // $data = require_once (APP_PATH . DIRECTORY_SEPARATOR . "log" . DIRECTORY_SEPARATOR . "Weather_Controller_log.txt");

        $uri = $this->getUri('/sendMessage?');

        $getQuery = [
            "chat_id" => $chat_id,
            "text"    =>
            "<b><strong>Location: </strong>" . $data["location"]["name"] . "</b>",
            // "text"    => "Погода на сегодня в " . $data['location']['name'] . $data["current"]["temp_c"] . $data["current"]["condition"]["icon"],
            "parse_mode" => "html",
        ];

        $this->view()->weather($uri, $getQuery);
    }
}
