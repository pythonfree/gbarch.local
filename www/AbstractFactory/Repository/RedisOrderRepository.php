<?php

namespace AbstractFactory\Repository;

use AbstractFactory\Contract\OrderRepositoryInterface;
use AbstractFactory\Entity\Order;

/**
 * class RedisOrderRepository Реализация репозитория заказов, который
 * работает с redis-БД.
 * @package Repository
 */
class RedisOrderRepository extends BaseRedisRepository implements OrderRepositoryInterface
{
    /**
     * @param Order $order
     * @return void
     */
    public function add(Order $order)
    {
        //Для коннекта к redis используется $this->getRedisConnection().
        echo 'Добавляем в redis заказ $order.' . PHP_EOL;
    }

    /**
     * @param Order $order
     * @return void
     */
    public function delete(Order $order)
    {
        //Для коннекта к redis используется $this->getRedisConnection().
        echo 'Удаляем в redis заказ $order.' . PHP_EOL;
    }

    /**
     * @param Order $order
     * @return void
     */
    public function update(Order $order)
    {
        //Для коннекта к redis используется $this->getRedisConnection().
        echo 'Изменяем в redis заказ $order.' . PHP_EOL;
    }


}