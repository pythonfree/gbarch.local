<?php

namespace IdentityMap\Contract;

interface StorageAdapterInterface
{
    public function find(int $id): ?array;
}