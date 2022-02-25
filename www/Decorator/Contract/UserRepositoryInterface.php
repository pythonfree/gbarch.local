<?php

declare(strict_types=1);

namespace Decorator\Contract;

use Decorator\Entity\User;

interface UserRepositoryInterface
{
    public function getById(int $id): User;
    public function findByName(string $name): ?User;
}