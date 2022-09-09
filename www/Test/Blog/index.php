<?php

namespace Test\Blog;

use DevCoder\DotEnv;
use DI\ContainerBuilder;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Test\Blog\Helper\Twig as TwigHelper;
use Test\Blog\Route\HomePage;
use Test\Blog\Slim\TwigMiddleware;
use Twig\Environment;

require __DIR__ . '/../../../vendor/autoload.php';

$builder = new ContainerBuilder();
$builder->addDefinitions('config/di.php');
(new DotEnv(__DIR__ . '/../../../.env'))->load();

$container = $builder->build();
AppFactory::setContainer($container);

$app = AppFactory::create();
$view = $container->get(Environment::class);
$app->add(new TwigMiddleware($view));
$connection = $container->get(DataBase::class)->getConnection();

$app->get('/Test/Blog/', HomePage::class . ':execute');

$app->get('/Test/Blog/about', function (Request $request, Response $response, $args) use ($view) {
    $body = $view->render('about.twig', [
            'name' => 'Max'
    ]);
    $response->getBody()->write($body);
    return $response;
});

$app->get('/Test/Blog/blog[/{page}]', function (Request $request, Response $response, $args) use ($view, $connection) {
    $page = isset($args['page']) ? (int)$args['page'] : 1;
    $limit = 2;
    $postMapper = new PostMapper($connection);
    try {
        $posts = $postMapper->getList($page, $limit, 'DESC');
        $totalCount = $postMapper->getTotalCount();
    } catch (\Exception $e) {
        echo $e->getMessage();
        die;
    }
    $body = $view->render('blog.twig', [
        'posts' => $posts,
        'pagination' => [
                'current' => $page,
                'paging' => ceil($totalCount / $limit),
        ]
    ]);
    $response->getBody()->write($body);
    return $response;
});

$app->get('/Test/Blog/{url_key}', function (Request $request, Response $response, $args) use ($view, $connection) {
    $post = (new PostMapper($connection))->getByUrlKey((string) $args['url_key']);
    $body = $view->render(TwigHelper::getPostTwigTemplate($post), [
        'post' => $post
    ]);
    $response->getBody()->write($body);
    return $response;
});

$app->run();
