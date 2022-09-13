<?php

namespace Test\Blog\Route;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Test\Blog\LatestsPost;
use Test\Blog\PostMapper;
use Twig\Environment;

class BlogPage
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
     * @param $args
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Request $request, Response $response, $args): ResponseInterface
    {
        $page = isset($args['page']) ? (int)$args['page'] : 1;
        $limit = 2;
        $posts = $this->postMapper->getList($page, $limit, 'DESC');
        $totalCount = $this->postMapper->getTotalCount();
        $body = $this->view->render('blog.twig', [
            'posts' => $posts,
            'pagination' => [
                'current' => $page,
                'paging' => ceil($totalCount / $limit),
            ]
        ]);
        $response->getBody()->write($body);
        return $response;
    }
}