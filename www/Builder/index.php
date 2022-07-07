<?php


use Builder\Director\Director;
use Builder\Builder\OrderBuilder;

spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^Builder/', '', $className);
    require_once __DIR__ . $className . '.php';
});

$director = new Director();

$orderBuilder = new OrderBuilder();
$director->constructNewOrder($orderBuilder);
$order = $orderBuilder->build();
echo 'Status of order is: ' . $order->getStatus() . PHP_EOL;

$orderBuilder = new OrderBuilder();
$director->constructRejectOrder($orderBuilder);
$order = $orderBuilder->build();
echo 'Status of order is: ' . $order->getStatus() . PHP_EOL;
