<?php

namespace Test\Blog\Route;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Test\Blog\Helper\Twig as TwigHelper;
use Test\Blog\LatestsPost;
use Test\Blog\PostMapper;
use Twig\Environment;

class PostPage
{
    /**
     * @var PostMapper
     */
    private PostMapper $postMapper;

    /**
     * @var Environment
     */
    private Environment $view;

    /**
     * @param Environment $view
     * @param PostMapper $postMapper
     */
    public function __construct(Environment $view, PostMapper $postMapper)
    {
        $this->view = $view;
        $this->postMapper = $postMapper;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Request $request, Response $response, array $args = []): ResponseInterface
    {
        $post = $this->postMapper->getByUrlKey((string) $args['url_key']);
        $body = $this->view->render(TwigHelper::getPostTwigTemplate($post), [
            'post' => $post
        ]);
        $response->getBody()->write($body);
        return $response;
    }
}