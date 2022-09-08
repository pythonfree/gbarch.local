<?php //rename in index.php for test slim

namespace Test\Blog;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use PDO;
use Test\Blog\PostMapper;

require __DIR__ . '/../../../vendor/autoload.php';
include_once __DIR__ . '/functions.php';

$config = include 'config/database.php';
$dsn = $config['dsn'];
$userName = $config['username'];
$password = $config['password'];

try {
    $connection = new PDO($dsn, $userName, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (\PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
    die;
}

$view = new Environment(new FilesystemLoader('templates'));

$app = AppFactory::create();

$app->get('/Test/Blog/', function (Request $request, Response $response, $args) use ($view, $connection) {
    $latestsPost = new LatestsPost($connection);
    try {
        $posts = $latestsPost->get(2);
    } catch (\Exception $e) {
        echo $e->getMessage();
        die;
    }
    $body = $view->render('index.twig', [
            'posts' => $posts
    ]);
    $response->getBody()->write($body);
    return $response;
});

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
    $latestPosts = new PostMapper($connection);
    try {
        $posts = $latestPosts->getList($page, $limit, 'DESC');
    } catch (\Exception $e) {
        echo $e->getMessage();
        die;
    }
    $body = $view->render('blog.twig', [
        'posts' => $posts
    ]);
    $response->getBody()->write($body);
    return $response;
});

$app->get('/Test/Blog/{url_key}', function (Request $request, Response $response, $args) use ($view, $connection) {
    $post = (new PostMapper($connection))->getByUrlKey((string) $args['url_key']);
    $body = $view->render(getPostTwigTemplate($post), [
        'post' => $post
    ]);
    $response->getBody()->write($body);
    return $response;
});

$app->run();

die;
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1 class="mb-3 mt-3">Welcome to my Blog</h1>
    <div class="container row">
        <div class="p-1">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://dummyimage.com/300x200/133e94/fff" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="p-1">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://dummyimage.com/300x200/133e94/fff" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="p-1">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://dummyimage.com/300x200/133e94/fff" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container row">
        <div class="p-1">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://dummyimage.com/300x200/133e94/fff" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="p-1">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://dummyimage.com/300x200/133e94/fff" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="p-1">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://dummyimage.com/300x200/133e94/fff" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>