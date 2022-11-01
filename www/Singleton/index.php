<?php

namespace Singleton;

class Singleton
{
    private static $instance = null;

    /**
     * Закрываем конструктор
     */
    private function __construct() {}

    /**
     * Закрываем восстановление из строк (десериализация)
     * @return void
     */
    private function __wakeup() {}

    /**
     * Закрываем клонирование
     * @return void
     */
    private function __clone() {}

    /**
     * Статический метод, который будет отдавать экземпляр данного класса.
     * Только через этот метод можно получить экземпляр класса, все остальные возможности закрыты.
     * @return Singleton
     */
    public static function getInstance(): Singleton
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * Логика нашего класса может быть реализована в других методах.
     * @return void
     */
    public function logic()
    {
        echo 'Логика нашего единого Singleton-класса.' . PHP_EOL;
    }
}

$s1 = Singleton::getInstance();
$s1->logic();

$s2 = Singleton::getInstance();
$s2->logic();

if ($s1 === $s2) {
    echo 'Обе переменные содержат в себе один и тот же экземпляр.' . PHP_EOL;
}
