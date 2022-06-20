<?php

class Order
{
    /**
     * @var DiscountCalculator
     */
    private $calculator;

    /**
     * @var float
     */
    private $sum;

    /**
     * Order constructor
     * @param float $sum
     * @param DiscountCalculator $calculator
     */
    public function __construct(float $sum, DiscountCalculator $calculator)
    {
        $this->sum = $sum;
        $this->calculator = $calculator;
    }

    /**
     * @return DiscountCalculator
     */
    public function getCalculator(): DiscountCalculator
    {
        return $this->calculator;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }

}


class DiscountCalculator
{
    /**
     * @var DiscountInterface[]
     */
    private $discounts;

    /**
     * @param DiscountInterface[] $discounts
     */
    public function __construct(...$discounts)
    {
        $this->discounts = $discounts;
    }

    /**
     * @param float $sum
     * @return float
     */
    public function getMinimalSumWithDiscount(float $sum): float
    {
        // для всех
        $minSum = $sum;

        foreach ($this->discounts as $discount) {
            $sumWithDiscount = $discount->getSumWithDiscount($sum);
            if ($sumWithDiscount < $minSum) {
                $minSum = $sumWithDiscount;
            }
        }

        return $minSum;
    }
}

/**
 * Interface DiscountInterface
 */
interface DiscountInterface
{

    /**
     * @param float $sum
     * @return float
     */
    public function getSumWithDiscount(float $sum): float;
}

class CommonDiscount implements DiscountInterface
{
    const DISCOUNT = 10;

    /**
     * @param float $sum
     * @return float
     */
    public function getSumWithDiscount(float $sum): float
    {
        return $sum - $sum / 100 * static::DISCOUNT;
    }
}

class NewYearDiscount implements DiscountInterface
{
    const DISCOUNT = 20;

    /**
     * @param float $sum
     * @return float
     */
    public function getSumWithDiscount(float $sum): float
    {
        if (date('d.m') == '31.12') {
            return $sum - $sum / 100 * static::DISCOUNT;
        }
        return $sum;
    }
}


/**
 * @return DiscountInterface[]
 */
function getAllDiscounts(): array
{
    return [
        new CommonDiscount(),
        new NewYearDiscount(),
    ];
}

$calculator = new DiscountCalculator(...getAllDiscounts());
$order = new Order(100, $calculator);
echo $order->getCalculator()->getMinimalSumWithDiscount($order->getSum()) . PHP_EOL;

