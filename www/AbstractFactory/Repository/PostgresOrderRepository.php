<?php

namespace AbstractFactory\Repository;


use AbstractFactory\Contract\OrderRepositoryInterface;
use AbstractFactory\Entity\Order;

/**
 * class PostgresOrderRepository Реализация репозитория заказов, который
 * работает с postgres-БД.
 * @package Repository
 */
class PostgresOrderRepository extends BasePostgresRepository implements OrderRepositoryInterface
{
    /**
     * @param Order $order
     * @return void
     */
    public function add(Order $order)
    {
        //Для коннекта к postgres используется $this->getPostgresConnection().
        echo 'Добавляем в postgres заказ $order.' . PHP_EOL;
    }

    /**
     * @param Order $order
     * @return void
     */
    public function delete(Order $order)
    {
        //Для коннекта к postgres используется $this->getPostgresConnection().
        echo 'Удаляем в postgres заказ $order.' . PHP_EOL;
    }

    /**
     * @param Order $order
     * @return void
     */
    public function update(Order $order)
    {
        //Для коннекта к postgres используется $this->getPostgresConnection().
        echo 'Изменяем в postgres заказ $order.' . PHP_EOL;
    }


}