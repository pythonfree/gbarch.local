<?php

namespace Test\MiniDuckSimulator;


class FlyWithWings implements FlyBehavior
{
    public function fly(): void
    {
        echo "I’m flying!!" . PHP_EOL;
    }
}

class Quack implements QuackBehavior
{
    public function quack(): void
    {
        echo 'Quack' . PHP_EOL;
    }
}

interface QuackBehavior
{
    public function quack(): void;
}

interface FlyBehavior
{
    public function fly(): void;
}

abstract class Duck
{
    protected FlyBehavior $flyBehavior;
    protected QuackBehavior $quackBehavior;

    public abstract function display(): void;

    public function performFly(): void
    {
        $this->flyBehavior->fly();
    }

    public function performQuack(): void
    {
        $this->quackBehavior->quack();
    }

    public function swim(): void
    {
        echo 'All ducks float, even decoys!' . PHP_EOL;
    }

}

class MallardDuck extends Duck
{

    public function __construct()
    {
        $this->quackBehavior = new Quack();
        $this->flyBehavior = new FlyWithWings();
    }

    public function display(): void
    {
        echo "I’m a real Mallard duck" . PHP_EOL;
    }
}

$mallard = new MallardDuck();
$mallard->performQuack();
$mallard->performFly();
