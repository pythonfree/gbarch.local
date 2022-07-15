<?php

namespace TemplateMethod\Networks;

use TemplateMethod\Contract\SocialNetworkPost;

class FacebookPost extends SocialNetworkPost
{

    /**
     * Выход из соц. сети. Реализация накладывается на наследника.
     * @return void
     */
    protected function LogOut(): void
    {
        echo 'Выход из Facebook успешно завершен.' . PHP_EOL;
    }

    /**
     * Реализация поста в соц. сети. Реализация накладывается на наследника.
     * @param string $message
     * @return bool
     */
    protected function sendPost(string $message): bool
    {
        echo "Пост с сообщением $message успешно отправлен в Facebook." . PHP_EOL;
        return true;
    }

    protected function afterSendPost(): void
    {
        echo "Сохранили сообщение." . PHP_EOL;
    }

    /**
     * Аутентификация в соц. сети. Реализация накладывается на наследника.
     * @param string $login
     * @param string $password
     * @return bool
     */
    protected function LogIn(string $login, string $password): bool
    {
        echo "Аутентификация Facebook. Login: {$login}; Password: {$password}" . PHP_EOL;
        echo 'Аутентификация прошла успешно' . PHP_EOL;
        return true;
    }
}