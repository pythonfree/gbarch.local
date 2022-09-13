<?php

namespace Blog;

use DevCoder\DotEnv;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Blog\Route\AboutPage;
use Blog\Route\BlogPage;
use Blog\Route\HomePage;
use Blog\Route\PostPage;

require __DIR__ . '/../../vendor/autoload.php';

$builder = new ContainerBuilder();
$builder->addDefinitions(__DIR__ . '/config/di.php');
(new DotEnv(__DIR__ . '/../../.env'))->load();
$container = $builder->build();
AppFactory::setContainer($container);

$app = AppFactory::create();
$app->get('/Blog/', HomePage::class . ':execute');
$app->get('/Blog/about', AboutPage::class);
$app->get('/Blog/blog[/{page}]', BlogPage::class);
$app->get('/Blog/{url_key}', PostPage::class);
$app->run();
