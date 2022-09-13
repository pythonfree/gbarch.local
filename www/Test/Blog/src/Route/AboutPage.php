<?php

namespace Test\Blog\Route;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Response;
use Twig\Environment;

class AboutPage
{
    /**
     * @var Environment
     */
    private Environment $view;

    /**
     * @param Environment $view
     */
    public function __construct(Environment $view)
    {
        $this->view = $view;
    }

    /**
     * @param Request $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Request $request, ResponseInterface $response): ResponseInterface
    {
        $body = $this->view->render('about.twig', [
            'name' => 'Max'
        ]);
        $response->getBody()->write($body);
        return $response;
    }
}