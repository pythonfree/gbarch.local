<?php

namespace Test\Blog;

use DevCoder\DotEnv;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Test\Blog\Route\AboutPage;
use Test\Blog\Route\BlogPage;
use Test\Blog\Route\HomePage;
use Test\Blog\Route\PostPage;
use Test\Blog\Slim\TwigMiddleware;

require __DIR__ . '/../../../vendor/autoload.php';

$builder = new ContainerBuilder();
$builder->addDefinitions('config/di.php');
(new DotEnv(__DIR__ . '/../../../.env'))->load();
$container = $builder->build();
AppFactory::setContainer($container);

$app = AppFactory::create();

$app->add($container->get(TwigMiddleware::class));
$app->get('/Test/Blog/', HomePage::class . ':execute');
$app->get('/Test/Blog/about', AboutPage::class);
$app->get('/Test/Blog/blog[/{page}]', BlogPage::class);
$app->get('/Test/Blog/{url_key}', PostPage::class);
$app->run();
