<?php

namespace DataMapper;

use DataMapper\Mapper\UserMapper;
use DataMapper\Storage\StorageAdapter;

spl_autoload_register(function ($className){
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^DataMapper/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$mapper = new UserMapper(new StorageAdapter());
$user = $mapper->findById(1);
echo 'Под id = 1 хранится пользователь с именем - ' . $user->getName() . PHP_EOL;

