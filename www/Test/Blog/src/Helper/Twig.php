<?php

namespace Test\Blog\Helper;

class Twig
{
    public static function getPostTwigTemplate($post): string
    {
        return !empty($post) ? 'post.twig' : 'not-found.twig';
    }

}