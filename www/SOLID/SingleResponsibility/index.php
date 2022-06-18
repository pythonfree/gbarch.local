<?php


class Balance
{
    /**
     * @var float
     */
    private $value;
    /**
     * @var string
     */
    private $currency;

    /**
     * Balance constructor
     * @param float $value
     * @param string $currency
     */
    public function __construct(float $value, string $currency)
    {
        $this->value = $value;
        $this->currency = $currency;
    }

    public function getString(): string
    {
        return $this->value . ' : ' . $this->currency;
    }

}

class User
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Balance
     */
    private $balance;

    /**
     * User constructor
     * @param string $name
     * @param Balance $balance
     */
    public function __construct(string $name, Balance $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    /**
     * @param Balance $balance
     */
    public function setBalance(Balance $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return Balance
     */
    public function getBalance(): Balance
    {
        return $this->balance;
    }
}

$balance = new Balance(100, 'rub');
$user = new User('Ivan', $balance);

//$user->balance = new Balance(111, 'rub');
//echo $user->balance->getString();

$user->setBalance($balance);
echo $user->getBalance()->getString();



















