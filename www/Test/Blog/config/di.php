<?php


use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use function DI\autowire;
use function Di\get;

return [
    FilesystemLoader::class => autowire()
        ->constructorParameter('paths', 'templates'),
    Environment::class => autowire()
        ->constructorParameter('loader', get(FilesystemLoader::class))
];