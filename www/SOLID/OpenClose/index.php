<?php

class Order
{
    /**
     * @var float
     */
    private $sum;

    /**
     * Order constructor
     * @param float $sum
     */
    public function __construct(float $sum)
    {
        $this->sum = $sum;
    }

    /**
     * @return float
     */
    public function getMinimalSumWithDiscount(): float
    {
        // для всех
        $discount = 10;

        // на хеллуин
        if (date('d.m') == '31.10') {
            $discount = 15;
        }

        if (date('d.m') == '01.01') {
            $discount = 15;
        }

        if (date('d.m') == '01.02') {
            $discount = 18;
        }

        if (date('d.m') == '31.10') {
            $discount = 20;
        }

        return $this->sum - $this->sum / 100 * $discount;

    }

}

$order = new Order(100);
echo $order->getMinimalSumWithDiscount();

