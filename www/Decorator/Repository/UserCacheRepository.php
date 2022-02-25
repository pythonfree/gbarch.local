<?php

namespace Decorator\Repository;

use Decorator\Contract\UserRepositoryInterface;
use Decorator\Entity\User;
use Decorator\Service\CacherService;

class UserCacheRepository implements UserRepositoryInterface
{
    /**
     * @var CacherService
     */
    private $cacher;

    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    public function __construct(
        CacherService           $cacher,
        UserRepositoryInterface $repository
    )
    {
        $this->cacher = $cacher;
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @return string
     */
    private function getByIdKey(int $id): string
    {
        return 'User:id:' . $id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function getById(int $id): User
    {
        $fromCache = $this->cacher->findByKey($this->getByIdKey($id));
        if ($fromCache === null) {
            return $this->repository->getById($id);
        }

        echo 'Доставляем пользователя по id = ' . $id . ' из КЕША' . '<br>';
        return $fromCache;
    }

    /**
     * @param string $name
     * @return string
     */
    private function getByNameKey(string $name): string
    {
        return 'User:name:' . $name;
    }

    /**
     * @param string $name
     * @return User|null
     */
    public function findByName(string $name): ?User
    {
        $fromCache = $this->cacher->findByKey($this->getByNameKey($name));
        if ($fromCache === null) {
            return $this->repository->findByName($name);
        }

        echo 'Доставляем пользователя по name = ' . $name . ' из КЕША' . '<br>';
        return $fromCache;
    }


}