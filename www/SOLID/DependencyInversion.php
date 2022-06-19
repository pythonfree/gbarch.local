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

class UserRepository
{
    /**
     * @var DbStorage
     */
    private DbStorage $storage;

    /**
     * @param DbStorage $storage
     */
    public function __construct(Storage $storage)
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
