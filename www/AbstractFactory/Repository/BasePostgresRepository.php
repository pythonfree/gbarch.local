<?php

namespace AbstractFactory\Repository;


use AbstractFactory\Db\Postgres;

/**
 * class BasePostgresRepository Абстрактный класс для каждого репозитория,
 * который будет работать с postgres-БД. Здесь будет храниться соединение с БД.
 * @package Repository
 */
abstract class BasePostgresRepository
{

    /**
     * @var Postgres
     */
    private $postgresConnection;

    /**
     * BasePostgresRepository constructor.
     * @param Postgres $postgresConnection
     */
    public function __construct(Postgres $postgresConnection)
    {
        $this->postgresConnection = $postgresConnection;
    }

    /**
     * @return Postgres
     */
    public function getPostgresConnection(): Postgres
    {
        return $this->postgresConnection;
    }


}