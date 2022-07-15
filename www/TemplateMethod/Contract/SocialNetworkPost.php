<?php

namespace TemplateMethod\Contract;

abstract class SocialNetworkPost
{
    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $password;

    /**
     * @param string $login
     * @param string $password
     */
    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }


    /**
     * Шаблонный метод, описано, как он должен идти, но каждый наследник реализует то, что ему нужно.
     * Заглушки не нарушают принцип единой ответственности.
     * @param string $message
     * @return bool
     */
    final public function post(string $message): bool
    {
        // Аутентификация на сайте
        if (!$this->LogIn($this->login, $this->password)) {
            return false;
        }
        $this->afterLogin();

        $result = $this->sendPost($message);
        $this->afterSendPost();

        $this->LogOut();
        $this->afterLogout();

        return $result;
    }

    /**
     * Хук, для того, чтобы сделать что-то после выхода. Переопределяется в наследнике.
     * @return void
     */
    protected function afterLogout(): void
    {

    }

    /**
     * Хук, для того, чтобы сделать что-то после отправки поста. Переопределяется в наследнике.
     * @return void
     */
    protected function afterSendPost(): void
    {

    }

    /**
     * Хук, для того, чтобы сделать что-то после аутентификации. Переопределяется в наследнике.
     * @return void
     */
    protected function afterLogin(): void
    {

    }

    /**
     * Выход из соц. сети. Реализация накладывается на наследника.
     * @return void
     */
    abstract protected function LogOut(): void;

    /**
     * Реализация поста в соц. сети. Реализация накладывается на наследника.
     * @param string $message
     * @return bool
     */
    abstract protected function sendPost(string $message): bool;

    /**
     * Аутентификация в соц. сети. Реализация накладывается на наследника.
     * @param string $login
     * @param string $password
     * @return bool
     */
    abstract protected function LogIn(string $login, string $password): bool;
}