<?php

namespace IdentityMap\EntityManager;

use IdentityMap\Contract\DomainObjectInterface;
use IdentityMap\IdentityMap\IdentityMap;
use IdentityMap\Mapper\UserMapper;

/**
 * Пример класса, который будет работать с IdentityMap и с БД, если в IdentityMap не будет сущности,
 * которую ищем.
 * @package IdentityMap\EntityManager
 */
class EntityManager
{
    /**
     * @var IdentityMap
     */
    private $identityMap;

    /**
     * @var UserMapper
     */
    private $userMapper;

    /**
     * @param IdentityMap $identityMap
     * @param UserMapper $userMapper
     */
    public function __construct(IdentityMap $identityMap, UserMapper $userMapper)
    {
        $this->identityMap = $identityMap;
        $this->userMapper = $userMapper;
    }

    public function findById(string $class, int $id)
    {
        // Сначала ищем в хранилище.
        /**
         * @var DomainObjectInterface $entity
         */
        $entity = $this->identityMap->find($class, $id);
        // Если в хранилище нашли объект, то возвращаем его.
        if ($entity !== null) {
            return $entity;
        }
        // Если в хранилище объекта нет, то ищем его в БД.
        // Здесь для упрощения используется только UserMapper, конечно в реальных проектах
        // будут не только пользователи, там используется более сложная конструкция EntityManager
        $entity = $this->userMapper->findById($id);
        // Если в базе нет такого пользователя, то возвращаем null
        if ($entity === null) {
            return null;
        }
        // Если в БД оказалось значение, то сохраняем его в хранилище
        $this->identityMap->add($entity);
        // Возвращаем объект
        return $entity;
    }

}