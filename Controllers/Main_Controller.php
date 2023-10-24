<?php

namespace Controllers;

use App\Controller\Controller;

class Main_Controller extends Controller
{

    public function start($uri, $chat_id)
    {
        /*
        $getQuery = array(
            "chat_id"     => $chat_id,
            "text"      => "Новое сообщение из формы",
            "parse_mode" => "html"
        );
        $ch = curl_init($uri . http_build_query($getQuery));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $resultQuery = curl_exec($ch);
        curl_close($ch);

        echo $resultQuery;
*/

        $getQuery = [
            "chat_id" => $chat_id,
            "text"      => "Новое сообщение из формы",
            "parse_mode" => "html",
            // 'reply_markup' => json_encode(array(
            //     'keyboard' => array(
            //         array(
            //             array(
            //                 'text' => 'Тестовая кнопка 1',
            //                 'url' => 'YOUR BUTTON URL',
            //             ),
            //             array(
            //                 'text' => 'Тестовая кнопка 2',
            //                 'url' => 'YOUR BUTTON URL',
            //             ),
            //         )
            //     ),
            //     'one_time_keyboard' => FALSE,
            //     'resize_keyboard' => TRUE,
            // )),
        ];

        $ch = curl_init($uri . http_build_query($getQuery));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $result = curl_exec($ch);
        print_r($result);
        curl_close($ch);
    }
}
