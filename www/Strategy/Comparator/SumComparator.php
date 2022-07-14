<?php

namespace Strategy\Comparator;

use Strategy\Contract\ComparatorInterface;
use Strategy\Entity\Order;

class SumComparator implements ComparatorInterface
{

    /**
     * @param Order $a
     * @param Order $b
     * @return int
     */
    public function compare($a, $b): int
    {
        return $a->getSum() <=> $b->getSum();
    }

}