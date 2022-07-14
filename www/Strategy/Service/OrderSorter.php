<?php

namespace Strategy\Service;

use Strategy\Contract\ComparatorInterface;
use Strategy\Entity\Order;

class OrderSorter
{
    /**
     * @var ComparatorInterface
     */
    private $comparator;

    /**
     * @param ComparatorInterface $comparator
     */
    public function __construct(ComparatorInterface $comparator)
    {
        $this->comparator = $comparator;
    }

    /**
     * @param Order[] $orders
     * @return Order[]
     */
    public function sort(array $orders): array
    {
        usort($orders, [$this->comparator, 'compare']);
        return $orders;
    }

}
