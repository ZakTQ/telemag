<?php

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