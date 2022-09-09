<?php


use Test\Blog\DataBase;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use function DI\autowire;
use function Di\get;

return [
    FilesystemLoader::class => autowire()
        ->constructorParameter('paths', 'templates'),
    Environment::class => autowire()
        ->constructorParameter('loader', get(FilesystemLoader::class)),
    DataBase::class => autowire()
        ->constructorParameter('dsn', getenv('DATABASE_DSN'))
        ->constructorParameter('username', getenv('DATABASE_USERNAME'))
        ->constructorParameter('password', getenv('DATABASE_PASSWORD'))
];