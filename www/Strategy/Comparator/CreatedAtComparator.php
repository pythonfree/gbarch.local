<?php

namespace Strategy\Comparator;

use Strategy\Contract\ComparatorInterface;
use Strategy\Entity\Order;

class CreatedAtComparator implements ComparatorInterface
{


    /**
     * @param Order $a
     * @param Order $b
     * @return int
     */
    public function compare($a, $b): int
    {
        return $a->getCreatedAt() <=> $b->getCreatedAt();
    }
}