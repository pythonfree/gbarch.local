<?php

namespace Prototype;

use DateTime;

spl_autoload_register(function ($className){
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^Prototype/', '', $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

class User {}
class Status {}

class Order
{
    /**
     * @var float
     */
    private $sum;

    /**
     * @var User
     */
    private $user;

    /**
     * @var Status
     */
    private $status;

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * @param float $sum
     * @param User $user
     * @param Status $status
     * @param DateTime $createdAt
     */
    public function __construct(float $sum, User $user, Status $status, DateTime $createdAt)
    {
        $this->sum = $sum;
        $this->user = $user;
        $this->status = $status;
        $this->createdAt = $createdAt;
    }

    /**
     * PHP встроенное клонирование. Однако, клонируются только простые примитивные типы.
     * Если какое-либо поле содержит другой объект, то понадобиться клонировать также и
     * вложенные объекты, используя такойж метод clone.
     * @return void
     */
    public function __clone()
    {
        $this->status = clone $this->status; // Те объекты, которые мы хотим создать новыми
        // $this->user = clone $this->user; // Те объекты, которые мы хотим создать новыми
        $this->createdAt = new DateTime(); // Те объекты, которые мы хотим создать новыми
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
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus(Status $status): void
    {
        $this->status = $status;
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

$user = new User();
$status = new Status();
$order1 = new Order(500, $user, $status, new DateTime()); // долгое создание
//$order1->setStatus(new Status()); // Изменили статус у первого заказа
// У все клонов первого заказа статус не изменится, т.к. в полях хранятся не ссылки, а новые объекты
// Скалярное же значение останется прежним
$order2 = clone $order1; // копия заказа, но с некоторыми условиями

echo 'Объекты равны: ' . ($order1 === $order2 ? 'true' : 'false') . PHP_EOL; // false
echo 'Суммы равны: ' . ($order1->getSum() === $order2->getSum() ? 'true' : 'false') . PHP_EOL; // true - скаляр
echo 'Пользователи равны: ' . ($order1->getUser() === $order2->getUser() ? 'true' : 'false') . PHP_EOL; // true - т.к.
// мы не указали методу clone необходимость создавать новый объект в поле user
echo 'Статусы равны: ' . ($order1->getStatus() === $order2->getStatus() ? 'true' : 'false') . PHP_EOL; // false - т.к.
// мы попросили метод clone создавать новый объект в поле статуса
echo 'Дата создания одна и таже: ' . ($order1->getCreatedAt() === $order2->getCreatedAt() ? 'true' : 'false') . PHP_EOL; // false - т.к.
// мы попросили метод clone создавать новый объект в поле даты создания
