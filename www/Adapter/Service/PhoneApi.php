<?php

namespace Adapter\Service;

/**
 * Адаптируемый класс - некий полезный класс, несовместимый с целевым
 * интерфейсом. Нельзя просто войти и изменить код класса так,чтобы следовать
 * целевому интерфейсу, так как код может предоставляться сторонней библиотекой.
 */
class PhoneApi
{
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function createConnection(): void
    {
        echo 'Создаем коннект в api сервиса по отправке SMS.' . PHP_EOL;
    }

    public function sendMessage(string $number, string $message): void
    {
        echo 'Отправляем SMS на номер ' . $number . ' с сообщением: ' . $message . PHP_EOL;
    }

}