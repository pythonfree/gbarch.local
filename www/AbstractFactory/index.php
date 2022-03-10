<?php


use AbstractFactory\Db\Postgres;
use AbstractFactory\Db\Redis;
use AbstractFactory\Factory\PostgresRepositoryFactory;
use AbstractFactory\Factory\RedisRepositoryFactory;
use AbstractFactory\Service\Service;

spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^AbstractFactory/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR .  $className . '.php';
});


$postgresRepositoryFactory = new PostgresRepositoryFactory(new Postgres());
$serviceWithPostgresRepositories = new Service($postgresRepositoryFactory);
$serviceWithPostgresRepositories->addUser();
$serviceWithPostgresRepositories->addOrder();

$redisRepositoryFactory = new RedisRepositoryFactory(new Redis());
$serviceWithRedisRepositories = new Service($redisRepositoryFactory);
$serviceWithRedisRepositories->addUser();
$serviceWithRedisRepositories->addOrder();