<?php

require_once (__DIR__ . '/init.php');
require_once (__DIR__ . '/App/Modules/Webhook/Webhook.php');

$json = json_decode(file_get_contents(__DIR__ . '/assets/ru.json'), true);
//телега
$tg = new Telegram($token);
//модуль одноразовой установки вебхука
$wb = new Webhook($tg);
$wb->setWebhookDynamic(__LINE__, $url);


$object = $tg->getData();
$chatid = $tg->ChatID();
$message = $tg->Text();
$name = $tg->FirstName();
$username = $tg->Username();
$message_id = $tg->MessageID();

if (isset($data)) $data = explode('/', $data);

//подключаение компонентов
require_once (__DIR__ . '/App/Components/message/start.php');

