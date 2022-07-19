<?php

namespace IdentityMap\Mapper;


use IdentityMap\Contract\StorageAdapterInterface;
use IdentityMap\Entity\User;

class UserMapper
{
    /**
     * @var StorageAdapterInterface
     */
    private $storageAdapter;

    /**
     * UserMapper constructor.
     * @param StorageAdapterInterface $storageAdapter
     */
    public function __construct(StorageAdapterInterface $storageAdapter)
    {
        $this->storageAdapter = $storageAdapter;
    }


    /**
     * @param int $id
     * @return User|null
     */
    public function findById(int $id): ?User
    {
        $result = $this->storageAdapter->find($id);
        if ($result === null) {
            return null;
        }
        return $this->mapRowToUser($result);

    }

    public function mapRowToUser(array $row): User
    {
        return new User($row['id'], $row['name'], $row['email']);
    }

}












