<?php

namespace Test;

use Symfony\Component\VarDumper\Caster\RdKafkaCaster;

include_once __DIR__ . '/../vendor/autoload.php';

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

    public function __construct()
    {
    }

    public abstract function  display(): void;

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
        echo 'All ducks float, even decoys!';
    }

}

class MallardDuck extends Duck
{

    public function __construct()
    {
        $quackBehavior = new Quack();
        $flyBehavior = new FlyWithWings();
    }
}

$mallard = new MallardDuck();
$mallard->performQuack();
$mallard->performFly();

//class MyDestructableClass
//{
//    function __construct() {
//        print "Конструктор\n";
//    }
//
//    function __destruct() {
//        print "Уничтожается " . __CLASS__  . "\n";
//    }
//}
//
//$obj = new MyDestructableClass();


//class Currency
//{
//    private string $code;
//
//    /**
//     * Create a new currency instance.
//     *
//     * @param  string  $code
//     * @return void
//     */
//    function __construct(string $code)
//    {
//        $this->code = $code;
//    }
//}
//
//$collection = collect(['USD', 'EUR', 'GBP']);
//
//$currencies = $collection->mapInto(Currency::class);
//
//print_r($currencies->all());




//function test()
//{
//    static $count = 0;
//
//    $count++;
//    echo $count . PHP_EOL;
//    if ($count < 10) {
//        test();
//    }
//    $count--;
//    echo 'minus ' . $count . PHP_EOL;
//}
//test();





//$collection = collect([
//    ['product_id' => 'prod-100', 'name' => 'desk'],
//    ['product_id' => 'prod-200', 'name' => 'chair'],
//]);
//
//$keyed = $collection->keyBy('product_id');
//var_dump($keyed);
//$keyed = $collection->keyBy('product_id')->all();
//var_dump($keyed);
//











//$collection = collect([1, 2, 3]);
//var_dump($collection->keyBy());












