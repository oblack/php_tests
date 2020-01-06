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

$obj = new MyCloneable();
$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;

print("Original object\n");
print_r($obj);

print("Cloned object\n");
print_r($obj2);