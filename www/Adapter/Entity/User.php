<?php

namespace Adapter\Entity;


use Adapter\Contract\NotifiableInterface;

/**
 * Class User Пользователь нашего приложения
 * @package Adapter\Entity
 */
class User implements NotifiableInterface
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * User constructor.
     * @param string $email
     * @param string $phone
     */
    public function __construct(string $email, string $phone)
    {
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }


}