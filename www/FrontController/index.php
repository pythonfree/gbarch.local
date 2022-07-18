<?php


use FrontController\FrontController\FrontController;

spl_autoload_register(function ($className){
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^FrontController/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});


echo 'Первый вызов:' . PHP_EOL;
// Вариант использования для http запроса.
$frontController = new FrontController();
$frontController->run();

echo PHP_EOL . '--------------------------------' . PHP_EOL;
echo 'Второй вызов:' . PHP_EOL;
// Если бы мы вызвали из командной строки action у контроллера.
$frontController = new FrontController([
    'controller' => 'user',
    'action' => 'view',
    'params' => ['id' => 5]
]);
$frontController->run();

