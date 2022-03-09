<?php

namespace AbstractFactory\Contract;


use AbstractFactory\Entity\Order;

/**
 * interface OrderRepositoryInterface Интерфейс, описывающий как должен работать
 *репозиторий по управлению заказами. Здесь нет упоминания о том, куда мы будем
 *сохранять заказ, здесь определены лишь методы для работы с заказами.
 *Куда сохранять эти заказы будет решать тот класс, который будет этот
 *интерфейс реализовывать.
 *@package Contract
 */
interface OrderRepositoryInterface
{
    /**
     * @param Order $order
     * @return void
     */
    public function add(Order $order);

    /**
     * @param Order $order
     * @return void
     */
    public function delete(Order $order);

    /**
     * @param Order $order
     * @return void
     */
    public function update(Order $order);


}