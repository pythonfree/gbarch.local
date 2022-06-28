<?php

interface Storage
{
    public function find(int $id);
}

class User{}

class DbStorage implements Storage // работает с базой напрямую
{
    /**
     * @param int $id
     * @return User
     */
    public function find(int $id)
    {
        return new User();
    }
}

class XmlStorage implements Storage
{
    public function find(int $id)
    {
        return new User();
    }

}

class UserRepository
{
    /**
     * @var Storage
     */
    private Storage $storage;

    /**
     * @param Storage $storage
     */
    public function __construct(Storage $storage) // зависимость от интерфейса Storage, не от объекта DbStorage
    {
        $this->storage = $storage;
    }

    public function getById(int $id): User
    {
        return $this->storage->find($id);
    }

}

$storage = new DbStorage();
$user = (new UserRepository($storage))->getById(1);
$xmlStorage = new XmlStorage();
$user = (new UserRepository($xmlStorage))->getById(1);