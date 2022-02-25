<?php

namespace Adapter\Notification;

use Adapter\Contract\NotifiableInterface;
use Adapter\Contract\NotificationInterface;
use Adapter\Service\PhoneApi;

/**
 * Адаптер - класс, который связывает Целевой интерфейс и Адаптируемый класс.
 * Это позволяет приложения использовать Phone API для отправки уведомлений.
 */
class PhoneNotification implements NotificationInterface
{
    /**
     * @var PhoneApi
     */
    private $phoneAPI;

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

    public function __construct(
        PhoneApi $phoneAPI,
        NotifiableInterface $notifiable,
        string $title,
        string $message
    )
    {
        $this->phoneAPI = $phoneAPI;
        $this->notifiable = $notifiable;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Адаптер способен адаптировать интерфейсы и преобразовать входные данные
     * в формат, необходимый Адаптируемому классу.
     */
    public function send(): void
    {
        $message = $this->title . ' ' . strip_tags($this->message);
        $this->phoneAPI->createConnection();
        $this->phoneAPI->sendMessage($this->notifiable->getPhone(), $message);
    }


}