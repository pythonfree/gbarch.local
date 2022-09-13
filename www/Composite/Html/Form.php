<?php

namespace Composite\Html;

use Composite\Contract\RenderableInterface;

/**
 * Это как раз и есть наш компоновщик, он имплементирует интерфейс
 * Этот компонент будет строить дерево элементов, которые будут выводиться.
 */
class Form implements RenderableInterface
{
    /**
     * @var RenderableInterface[]
     */
    private array $elements;

    /**
     * @return string
     */
    public function render(): string
    {
        $formCode = '<form>';

        //У каждого вложенного элемента вызывается его рендер.
        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }

        $formCode .= (new SubmitInputElement())->render();

        $formCode .= '</form>';

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