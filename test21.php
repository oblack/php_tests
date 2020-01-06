<?php

class MyClass
{

    private $myArray = array();

    function pushToClassArray($var)
    {
        array_push($this->myArray, $var);
    }

    function getArray()
    {
        return $this->myArray;
    }

}

//push some values to the myArray of Mainclass
$myObj = new MyClass();
$myObj->pushToClassArray('blue');
$myObj->pushToClassArray('orange');
$myObjClone = clone $myObj;
$myObj->pushToClassArray('pink');

//testing
print_r($myObj->getArray());     //Array([0] => blue,[1] => orange,[2] => pink)
print_r($myObjClone->getArray());//Array([0] => blue,[1] => orange)