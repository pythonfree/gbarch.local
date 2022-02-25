<?php

namespace Adapter\Contract;

/**
 * Интерфейс, который использует наше приложение для отправки оповещения.
 */
interface NotificationInterface
{
    public function send(): void;
}