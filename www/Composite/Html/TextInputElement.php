<?php

namespace Composite\Html;

use Composite\Contract\RenderableInterface;

class TextInputElement implements RenderableInterface
{
    /**
     * @return string
     */
    public function render(): string
    {
        return '<input type="text">';
    }
}