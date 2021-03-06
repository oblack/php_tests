<?php
class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct() {
        $this->instance = ++self::$instances;
    }

    public function __clone() {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;

    function __clone()
    {
        $this->object1 = clone $this->object1;
    }
}

trait myTrait {
    function myFunction() {
        print "inside trait\n\n";
    }
}

class myTraitClass {
    use myTrait;

    public function testTrait() {
        $this->myFunction();
    }
}

$traitTest = new myTraitClass();
$traitTest->testTrait();

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;

print("Original object\n");
print_r($obj);

print("Cloned object\n");
print_r($obj2);




trait TestTrait {
    public function testMethod() {
        echo "Class: " . __CLASS__ . PHP_EOL;
        echo "Trait: " . __TRAIT__ . PHP_EOL;
    }
}

class BaseClass {
    use TestTrait;
}

class TestClass extends BaseClass {

}

$t = new TestClass();
$t->testMethod();