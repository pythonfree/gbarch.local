<?php

namespace TemplateMethod\Networks;

use TemplateMethod\Contract\SocialNetworkPost;

class VkPost extends SocialNetworkPost
{

    /**
     * Выход из соц. сети. Реализация накладывается на наследника.
     * @return void
     */
    protected function LogOut(): void
    {
        echo 'Выход из ВК успешно завершен.' . PHP_EOL;
    }

    /**
     * Реализация поста в соц. сети. Реализация накладывается на наследника.
     * @param string $message
     * @return bool
     */
    protected function sendPost(string $message): bool
    {
        echo "Пост с сообщением $message успешно отправлен в ВК." . PHP_EOL;
        return true;
    }

    /**
     * Аутентификация в соц. сети. Реализация накладывается на наследника.
     * @param string $login
     * @param string $password
     * @return bool
     */
    protected function LogIn(string $login, string $password): bool
    {
        echo "Аутентификация Вконтакте. Login: {$login}; Password: {$password}" . PHP_EOL;
        echo 'Аутентификация прошла успешно' . PHP_EOL;
        return true;
    }

    protected function afterLogin(): void
    {
        echo 'Сохранили информацию о входе в логах.' . PHP_EOL;
    }

    protected function afterLogout(): void
    {
        echo 'Сохранили информацию о выходе в логах.' . PHP_EOL;
    }
}