<?php

namespace Composite\Contract;

/**
 * Interface RenderableInterface Интерфейс для элемента, который будет
 * отображаться на сайте.
 * @package Composite\Contract
 */
interface RenderableInterface
{
    public function render(): string;
}