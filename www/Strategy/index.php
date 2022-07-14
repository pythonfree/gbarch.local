<?php

namespace Strategy;

use Strategy\Comparator\CreatedAtComparator;
use Strategy\Comparator\IdComparator;
use Strategy\Comparator\SumComparator;
use Strategy\Entity\Order;
use Strategy\Service\OrderSorter;

spl_autoload_register(function ($className){
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^Strategy/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$orders = [
    new Order(1, 500, new \DateTime('2010-01-01')),
    new Order(5, 1000, new \DateTime('2011-01-01')),
    new Order(4, 15.55, new \DateTime('2015-01-01')),
    new Order(3, 133, new \DateTime('2013-01-01')),
    new Order(2, 582, new \DateTime('2019-01-01')),
];

$idSorter = new OrderSorter(new IdComparator());
$sumSorter = new OrderSorter(new SumComparator());
$createdAt = new OrderSorter(new CreatedAtComparator());

/**
 * @param Order[] $orders
 * @return void
 */
function renderOrders(array $orders)
{
    foreach ($orders as $order) {
        echo "id: {$order->getId()}\tsum: {$order->getSum()}\tcreated at: {$order->getCreatedAt()->format('Y-m-d')}" . PHP_EOL;
    }
}

echo 'Сортируем по Id:' . PHP_EOL;
$idSorterArray = $idSorter->sort($orders);
renderOrders($idSorterArray);

echo 'Сортируем по Sum:' . PHP_EOL;
$sumSorterArray = $sumSorter->sort($orders);
renderOrders($sumSorterArray);

echo 'Сортируем по Дате:' . PHP_EOL;
$createdAtArray = $createdAt->sort($orders);
renderOrders($createdAtArray);
