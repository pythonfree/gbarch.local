<?php

namespace AbstractFactory\Contract;


/**
 * Interface RepositoryFactoryInterface Интерфейс абстрактной фабрики, наша
 * абстрактная фабрика может создавать репозитории, куда эти репозитории будут
 * сохранять свои данные, здесь нас это не интересует.
 * @package Contract
 */
interface RepositoryFactoryInterface
{
    /**
     * @return UserRepositoryInterface
     */
    public function createUserRepository(): UserRepositoryInterface;

    /**
     * @return OrderRepositoryInterface
     */
    public function createOrderRepository(): OrderRepositoryInterface;



}