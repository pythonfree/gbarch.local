<?php

namespace Builder\Entity;

use Builder\Contract\OrderBuilderInterface;

class Order
{
    public const STATUS_NEW = 'new';
    public const STATUS_PAYED = 'payed';
    public const STATUS_REJECTED = 'rejected';

    /**
     * @var Invoice
     */
    private $invoice;

    /**
     * @var Payment
     */
    private $payment;

    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $status;

    public function __construct(OrderBuilderInterface $builder)
    {
        $this->invoice = $builder->getInvoice();
        $this->payment = $builder->getPayment();
        $this->user = $builder->getUser();
        $this->status = $builder->getStatus();
    }

    /**
     * @return Invoice
     */
    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     */
    public function setInvoice(Invoice $invoice): void
    {
        $this->invoice = $invoice;
    }

    /**
     * @return Payment
     */
    public function getPayment(): Payment
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     */
    public function setPayment(Payment $payment): void
    {
        $this->payment = $payment;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}