<?php


use Decorator\Repository\UserCacheRepository;
use Decorator\Repository\UserRepository as UserRepository;
use Decorator\Service\CacherService;
use Decorator\Service\UserService as UserService;
use Facade\Facade\ImageManager;
use Facade\Service\CdnUploader;
use Facade\Service\ImageDownloader;
use Facade\Service\ImageResizer;

spl_autoload_register(function ($className){
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^Facade/', '', $className);
    require_once __DIR__ . $className . '.php';
});

//Проблема - много действия, из них какое-нибудь можноо забыть и все сломается
(new ImageDownloader('path_to_download'))->upload('image.jpg');
(new ImageResizer())->resize('image_resized.jpg', 100, 100);
(new CdnUploader('apiKey...'))->upload('pathToUploadCdn');


//Превращается в:
$imageManager = new ImageManager('file.jpg');
$imageManager->downloadImage('file.jpg');