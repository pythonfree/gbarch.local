<?php

declare(strict_types=1);

namespace Decorator\Service;

use Decorator\Contract\UserRepositoryInterface;
use Decorator\Entity\User;

class UserService
{
    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $repository
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $name
     * @return User|null
     */
    public function findByName(string $name)
    {
        return $this->repository->findByName($name);
    }
}