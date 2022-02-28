<?php

namespace Composite\Html;

use Composite\Contract\RenderableInterface;

class SubmitInputElement implements RenderableInterface
{
    /**
     * @return string
     */
    public function render(): string
    {
        return '<input type="submit">';
    }

}