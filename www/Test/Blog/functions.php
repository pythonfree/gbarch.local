<?php

function getPostTwigTemplate($post): string
{
    return !empty($post) ? 'post.twig' : 'not-found.twig';
}

