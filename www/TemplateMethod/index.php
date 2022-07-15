<?php

namespace Strategy;

use Strategy\Comparator\CreatedAtComparator;
use Strategy\Comparator\IdComparator;
use Strategy\Comparator\SumComparator;
use Strategy\Entity\Order;
use Strategy\Service\OrderSorter;
use TemplateMethod\Networks\FacebookPost;
use TemplateMethod\Networks\VkPost;

spl_autoload_register(function ($className){
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^TemplateMethod/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$vk = new VkPost('Viktor', '12345');
$vk->post('Hello VK from Pavel!');
echo '========================' . PHP_EOL;

$fb = new FacebookPost('Fedor', '12345');
$fb->post('Hello FB from Fedor!');
echo '========================' . PHP_EOL;




