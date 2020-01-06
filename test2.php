<?php
class A
{
    function foo()
    {
        if (isset($this)) {
            echo '$this is defined (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this is not defined.\n";
        }
    }
}

class B
{
    function bar()
    {
        A::foo();
    }
}

class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct()
    {
        $this->instance = ++self::$instances;
    }

    public function __clone()
    {
        $this->instance == ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;

    function __clone() {
        $this->object1 == clone $this->object1;
    }
}


class Test
{
    static public function getNew() {
        return new static;
    }
}

class Child extends Test{}

$obj1 = new Test();
$obj2 = new $obj1();
var_dump($obj1);
var_dump($obj2);
var_dump($obj1 === $obj2);

$obj3 = Test::getNew();
var_dump($obj3 instanceof Test);

$obj4 = Child::getNew();
var_dump($obj4 instanceof Test);

echo (new DateTime())->format('Y');
echo 'Hello';


//
//$instance = new A;
//$assigned   =  $instance;
//$instance->var = '$assigned will have this value';
//
//$reference  =& $instance;
//
//
//
//
//var_dump($assigned);
//var_dump($reference);
