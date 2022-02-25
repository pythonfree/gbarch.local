<?php

declare(strict_types=1);

namespace Decorator\Service;

use Decorator\Entity\User;

class CacherService
{
    /**
     * @var array
     */
    private $cached = []; //Зачастую это мемкеш или любой другой проект

    /**
     * CacherService constructor
     */
    public function __construct()
    {
        //Имитируем, что в кеше что-то есть, просто для примера.
        $this->cached = [
            //'User:id:1' => new User(1, 'Павел'),
            //'User:id:2' => new User(2, 'Андрей'),
            'User:name:Павел' => new User(1, 'Павел'),
        ];
    }

    /**
     * @param string $key
     * @return User|mixed|null
     */
    public function findByKey(string $key)
    {
        if (array_key_exists($key, $this->cached)) {
            return $this->cached[$key];
        }
        return null;
    }

}