<?php

if ($message == '/start') {
    $content = array('chat_id' => $chatid, 'text' => $json['text']['старт']);
    $tg->sendMessage($content);
    exit();
}

if (stripos($message, '#тз')) {
    mail(EMAIL, SUBJECT, $message);
    exit();
}
