<?php

include_once __DIR__ . '/../../vendor/autoload.php';

use Chat\MyChat;

//for WS client use ...
$app = new Ratchet\App('localhost', 8080);
$app->route('/chat', new MyChat, array('*'));
$app->route('/echo', new Ratchet\Server\EchoServer, array('*'));
$app->run();