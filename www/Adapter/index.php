<?php


use Adapter\Contract\NotificationInterface;
use Adapter\Entity\User;
use Adapter\Notification\EmailNotification;
use Adapter\Notification\PhoneNotification;
use Adapter\Service\PhoneApi;


spl_autoload_register(function ($className){
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^Adapter/', '', $className);
    require_once __DIR__ . $className . '.php';
});

/**
 * @param NotificationInterface[] $notifications
 */
function sendNotification(array $notifications)
{
    //Клиентский код работает с классами, которые следуют целевому интерфейсу
    foreach ($notifications as $notification) {
        $notification->send();
    }
}

$user = new User('test@gmail.com', '32342342342');
$phoneApi = new PhoneApi('secretApiKey');

$notifications = [
    new EmailNotification($user, 'Hello!', 'Cam to me))'),
    new PhoneNotification($phoneApi, $user, 'HellofromPhone', 'Com to mee smS!!')
];

sendNotification($notifications);