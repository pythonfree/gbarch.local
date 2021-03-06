<?php

namespace AbstractFactory\Factory;

use AbstractFactory\Contract\OrderRepositoryInterface;
use AbstractFactory\Contract\RepositoryFactoryInterface;
use AbstractFactory\Contract\UserRepositoryInterface;
use AbstractFactory\Db\Postgres;
use AbstractFactory\Repository\PostgresOrderRepository;
use AbstractFactory\Repository\PostgresUserRepository;

/**
 * Class PostgresRepositoryFactory Класс-фабрика, реализующий интерфейс
 * абстрактной фабрики. Данный класс будет создавать репозитории, которые
 * работают с postgres-БД.
 * @package Factory
 */
class PostgresRepositoryFactory implements RepositoryFactoryInterface
{
    /**
     * @var Postgres
     */
    private $postgresConnection;

    /**
     * PostgresRepositoryFactory constructor.
     * @param Postgres $postgresConnection
     */
    public function __construct(Postgres $postgresConnection)
    {
        $this->postgresConnection = $postgresConnection;
    }

    /**
     * @return UserRepositoryInterface
     */
    public function createUserRepository(): UserRepositoryInterface
    {
        return new PostgresUserRepository($this->postgresConnection);
    }

    /**
     * @return OrderRepositoryInterface
     */
    public function createOrderRepository(): OrderRepositoryInterface
    {
        return new PostgresOrderRepository($this->postgresConnection);
    }
}