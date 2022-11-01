<?php

include_once __DIR__ . '/../../vendor/autoload.php';

use Ratchet\Server\IoServer;
use Chat\Chat;

//for client use $ telnet localhost 8080
$server = IoServer::factory(
    new Chat(),
    8080
);

$server->run();
