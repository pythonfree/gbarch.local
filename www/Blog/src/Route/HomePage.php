<?php

namespace Blog\Route;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Blog\LatestPosts;
use Twig\Environment;

class HomePage
{
    /**
     * @var LatestPosts
     */
    private LatestPosts $latestPosts;
    /**
     * @var Environment
     */
    private Environment $view;

    /**
     * @param LatestPosts $latestsPost
     * @param Environment $view
     */
    public function __construct(LatestPosts $latestPosts, Environment $view)
    {
        $this->latestPosts = $latestPosts;
        $this->view = $view;
    }


    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function execute(Request $request, Response $response, $args): ResponseInterface
    {
        $posts = $this->latestPosts->get(2);
        $body = $this->view->render('index.twig', [
            'posts' => $posts
        ]);
        $response->getBody()->write($body);
        return $response;
    }
}