<?php

namespace AbstractFactory\Repository;

use AbstractFactory\Contract\UserRepositoryInterface;
use AbstractFactory\Entity\User;

/**
 * class PostgresUserRepository Реализация репозитория пользователей, который
 * работает с postgres-БД
 * @package Repository
 */
class PostgresUserRepository extends BasePostgresRepository implements UserRepositoryInterface
{
    /**
     * @param User $user
     * @return void
     */
    public function add(User $user)
    {
        //Для коннекта к postgres используется $this->getPostgresConnection().
        echo 'Добавляем в postgres пользователя $user' . PHP_EOL;
    }

    /**
     * @param User $user
     * @return void
     */
    public function delete(User $user)
    {
        //Для коннекта к postgres используется $this->getPostgresConnection().
        echo 'Добавляем в postgres пользователя $user' . PHP_EOL;
    }

    /**
     * @param User $user
     * @return void
     */
    public function update(User $user)
    {
        //Для коннекта к postgres используется $this->getPostgresConnection().
        echo 'Добавляем в postgres пользователя $user' . PHP_EOL;
    }
}