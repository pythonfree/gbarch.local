<?php

namespace IdentityMap\IdentityMap;

use IdentityMap\Contract\DomainObjectInterface;

class IdentityMap
{
    /**
     * Массив со всеми сохраненными объектами, которые достали из БД.
     * @var array
     */
    private $identityMap = [];

    /**
     * Добавляет в массив $identityMap новый объект.
     * В данном случае используется id, в реальных примерах часто используется кеш объекта, для того
     * чтобы отследить был ли такой объект уже запрошен.
     * @param DomainObjectInterface $obj
     * @return void
     */
    public function add(DomainObjectInterface $obj)
    {
        $key = $this->getGlobalKey(get_class($obj), $obj->getId());
        $this->identityMap[$key] = $obj;
    }


    /**
     * Ищет в массиве объект.
     * @param string $className
     * @param int $id
     * @return mixed|null
     */
    public function find(string $className, int $id)
    {
        $key = $this->getGlobalKey($className, $id);
        if (isset($this->identityMap[$key])) {
            return $this->identityMap[$key];
        }
        return null;
    }


    /**
     * Возвращает ключ для хранения в $identityMap, который собирается
     * из класса и id нашего объекта.
     * @param string $className
     * @param int $id
     * @return string
     */
    private function getGlobalKey(string $className, int $id)
    {
        return sprintf('%s.%d', $className, $id);
    }
}