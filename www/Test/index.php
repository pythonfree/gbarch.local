<?php

namespace Test;

include_once __DIR__ . '/../vendor/autoload.php';


$collection = collect([
    ['product_id' => 'prod-100', 'name' => 'desk'],
    ['product_id' => 'prod-200', 'name' => 'chair'],
]);

//$keyed = $collection->keyBy('product_id');
//var_dump($keyed);
$keyed = $collection->keyBy('product_id')->all();
var_dump($keyed);












//$collection = collect([1, 2, 3]);
//var_dump($collection->keyBy());







//function test()
//{
//    static $count = 0;
//
//    $count++;
//    echo $count . PHP_EOL;
//    if ($count < 10) {
//        test();
//    }
//    $count--;
//    echo 'minus ' . $count . PHP_EOL;
//}
//test();




