<?php

namespace Test\Blog\Slim;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Test\Blog\Twig\AssetExtension;
use Twig\Environment;

/**
 *
 */
class TwigMiddleware implements MiddlewareInterface
{
    /**
     * @param Environment $environment
     * @param AssetExtension $assetExtension
     */
    public function __construct(Environment $environment, AssetExtension $assetExtension)
    {
        $environment->addExtension($assetExtension);
    }


    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $handler->handle($request);
    }
}