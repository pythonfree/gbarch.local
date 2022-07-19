<?php

namespace IdentityMap;


use IdentityMap\Entity\User;
use IdentityMap\EntityManager\EntityManager;
use IdentityMap\IdentityMap\IdentityMap;
use IdentityMap\Mapper\UserMapper;
use IdentityMap\Storage\StorageAdapter;

spl_autoload_register(function ($className){
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^IdentityMap/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$entityManager = new EntityManager(
    new IdentityMap(),
    new UserMapper(new StorageAdapter())
);

$user = $entityManager->findById(User::class, 1);
echo 'Под id = 1 хранится пользователь с именем - ' . $user->getName() . PHP_EOL;

// При попытке еще раз получить такого же пользователя мы получим тот же объект
// Снова в БД не лезем.
$user2 = $entityManager->findById(User::class, 1);
echo 'Объект один и тот же: ' . ($user === $user2 ? 'true' : 'false') . PHP_EOL;
