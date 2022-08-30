<?php

namespace FactoryMethod\Contract;

abstract class BaseBanner
{
    /**
     * Фабричный метод. Этот метод будет что-то создавать, а данном случае - это
     * строка HTML баннера, но чаще всего создается какой-то класс, который
     * используется для работы нашего класса.
     * @return string
     */
    abstract protected function prepareHTML(): string;

    /**
     * Показываем баннер.
     */
    public function show(): void
    {
        echo $this->prepareHTML();
    }

}