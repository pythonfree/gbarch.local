<?php

use Blog\DataBase;
use Blog\Twig\AssetExtension;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use function DI\autowire;
use function Di\get;

return [
    'server.params' => $_SERVER,
    FilesystemLoader::class => autowire()
        ->constructorParameter('paths', 'templates'),

    Environment::class => autowire()
        ->constructorParameter('loader', get(FilesystemLoader::class))
        ->method('addExtension', get(AssetExtension::class)),

    DataBase::class => autowire()
        ->constructorParameter('connection', get(PDO::class)),

    PDO::class => autowire()
        ->constructor(
            getenv('DATABASE_DSN'),
            getenv('DATABASE_USERNAME'),
            getenv('DATABASE_PASSWORD')
        )
        ->constructorParameter('options', [])
        ->method('setAttribute', PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
        ->method('setAttribute', PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC),

    AssetExtension::class => autowire()
        ->constructorParameter('serverParams', get('server.params')),
];