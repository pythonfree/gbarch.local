<?php

namespace AbstractFactory\Repository;

use AbstractFactory\Contract\UserRepositoryInterface;
use AbstractFactory\Entity\User;

/**
 * class RedisUserRepository Реализация репозитория пользователей, который
 * работает с redis-БД
 * @package Repository
 */
class RedisUserRepository extends BaseRedisRepository implements UserRepositoryInterface
{
    /**
     * @param User $user
     * @return void
     */
    public function add(User $user)
    {
        //Для коннекта к redis используется $this->getRedisConnection().
        echo 'Добавляем в redis пользователя $user' . PHP_EOL;
    }

    /**
     * @param User $user
     * @return void
     */
    public function delete(User $user)
    {
        //Для коннекта к redis используется $this->getRedisConnection().
        echo 'Добавляем в redis пользователя $user' . PHP_EOL;
    }

    /**
     * @param User $user
     * @return void
     */
    public function update(User $user)
    {
        //Для коннекта к redis используется $this->getRedisConnection().
        echo 'Добавляем в redis пользователя $user' . PHP_EOL;
    }
}