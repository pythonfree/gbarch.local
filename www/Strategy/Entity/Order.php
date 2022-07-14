<?php

namespace Strategy\Entity;

use DateTime;

class Order
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var float
     */
    private $sum;

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * @param int $id
     * @param float $sum
     * @param DateTime $createdAt
     */
    public function __construct(int $id, float $sum, DateTime $createdAt)
    {
        $this->id = $id;
        $this->sum = $sum;
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }

    /**
     * @param float $sum
     */
    public function setSum(float $sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

}