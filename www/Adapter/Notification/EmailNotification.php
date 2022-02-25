<?php

namespace Adapter\Notification;

use Adapter\Contract\NotifiableInterface;
use Adapter\Contract\NotificationInterface;

/**
 * Вот пример существующего класса, который следует за целевым интерфейсом.
 *
 * Дело в том, что у большинства приложений нет четко определенного интерфейса.
 * В этом случае лучше было бы расширить Адаптер за счет существующего класса
 * приложения. Если это неудобно, тогда первым шагом должно быть извлечение интерфейса.
 */
class EmailNotification implements NotificationInterface
{
    /**
     * @var NotifiableInterface
     */
    private $notifiable;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $message;

    /**
     * @param NotifiableInterface $notifiable
     * @param string $title
     * @param string $message
     */
    public function __construct(
        NotifiableInterface $notifiable,
        string $title,
        string $message
    )
    {
        $this->notifiable = $notifiable;
        $this->title = $title;
        $this->message = $message;
    }

    public function send(): void
    {
        echo 'Посылаем email с заголовком ' . $this->title . ' по адресу '
            . $this->notifiable->getEmail() . ' с сообщением '
            . $this->message . PHP_EOL;

    }
}