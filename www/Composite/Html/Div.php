<?php

namespace Composite\Html;

use Composite\Contract\RenderableInterface;

/**
 * Это как раз и есть наш компоновщик, он имплементирует интерфейс
 * Этот компонент будет строить дерево элементов, которые будут выводиться.
 */
class Div implements RenderableInterface
{
    /**
     * @var RenderableInterface[]
     */
    private $elements;

    /**
     * @return string
     */
    public function render(): string
    {
        $formCode = '<div>';

        //У каждого вложенного элемента вызывается его рендер.
        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }

        $formCode .= (new SubmitInputElement())->render();

        $formCode .= '</div>';

        return $formCode;
    }

    /**
     * @param RenderableInterface $element
     */
    public function addElement(RenderableInterface $element)
    {
        $this->elements[] = $element;
    }

}