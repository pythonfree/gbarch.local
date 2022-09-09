<?php

namespace Test\Blog\Route;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Test\Blog\DataBase;
use Test\Blog\LatestsPost;
use Twig\Environment;

class HomePage
{
    /**
     * @var LatestsPost
     */
    private LatestsPost $latestsPost;
    /**
     * @var Environment
     */
    private Environment $view;

    /**
     * @param LatestsPost $latestsPost
     * @param Environment $view
     */
    public function __construct(LatestsPost $latestsPost, Environment $view)
    {
        $this->latestsPost = $latestsPost;
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
    public function execute(Request $request, Response $response, $args): Response
    {
        $posts = $this->latestsPost->get(2);
        $body = $this->view->render('index.twig', [
            'posts' => $posts
        ]);
        $response->getBody()->write($body);
        return $response;
    }
}