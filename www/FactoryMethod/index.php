<?php


use FactoryMethod\Contract\BaseBanner;
use FactoryMethod\Entity\ImageBanner;
use FactoryMethod\Entity\TextBanner;

spl_autoload_register(function ($className){
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^FactoryMethod/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

/**
 * @var BaseBanner[] $banners
 */
$banners = [
    new ImageBanner('/assert/banner.jpg'),
    new TextBanner('Поехали!'),
];

foreach ($banners as $banner) {
    $banner->show();
}