<?php

namespace Controllers;

use App\Core\Controller\Controller;

class Main_Controller extends Controller
{

    public function start($chat_id)
    {
        $uri = $this->getUri('/sendMessage?');

        $getQuery = [
            "chat_id" => $chat_id,
            "text"      => "Новое сообщение из формы",
            "parse_mode" => "html",
            // 'reply_markup' => json_encode(array(
            //     'keyboard' => array(
            //         array(
            //             array(
            //                 'text' => 'Тестовая кнопка 1',
            //                 'url' => 'https://www.youtube.com/',
            //             ),
            //             array(
            //                 'text' => 'Тестовая кнопка 2',
            //                 'callback_data' => 'test_2',
            //             ),
            //         )
            //     ),
            //     'one_time_keyboard' => FALSE,
            //     'resize_keyboard' => TRUE,
            // )),
        ];

        $this->view()->sendMessage($uri, $getQuery);
    }
}
