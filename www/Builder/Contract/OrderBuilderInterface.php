<?php

namespace Builder\Contract;

use Builder\Entity\Invoice;
use Builder\Entity\Order;
use Builder\Entity\Payment;
use Builder\Entity\User;

interface OrderBuilderInterface
{
    /**
     * @return Invoice|null
     */
    public function getInvoice(): ?Invoice;

    /**
     * @return Payment|null
     */
    public function getPayment(): ?Payment;

    /**
     * @return User|null
     */
    public function getUser(): ?User;

    /**
     * @return string|null
     */
    public function getStatus(): ?string;

    /**
     * @param Invoice $invoice
     * @return OrderBuilderInterface
     */
    public function setInvoice(Invoice $invoice): self;

    /**
     * @param Payment $payment
     * @return OrderBuilderInterface
     */
    public function setPayment(Payment $payment): self;

    /**
     * @param User $user
     * @return OrderBuilderInterface
     */
    public function setUser(User $user): self;

    /**
     * @param string $status
     * @return OrderBuilderInterface
     */
    public function setStatus(string $status): self;

    /**
     * @return Order
     */
    public function build(): Order;
}