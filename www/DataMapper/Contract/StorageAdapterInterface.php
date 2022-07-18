<?php

namespace DataMapper\Contract;

interface StorageAdapterInterface
{
    public function find(int $id): ?array;
}