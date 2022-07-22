<?php

namespace Test;

function test()
{
    static $count = 0;

    $count++;
    echo $count . PHP_EOL;
    if ($count < 10) {
        test();
    }
    $count--;
    echo 'minus ' . $count . PHP_EOL;
}
test();