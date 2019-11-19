<?php

class Person
{
    // public static function here;

    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

class House
{
    private $dwellers = array();

    public static function census($people)
    {
        return array_map(function ($name) {
            return $name->name();
          }, $people);

    }

    public function addDweller($person)
    {
        $this->dwellers = array_push($dwellers, $person);
        return $this;
    }

    public static function averageAge($people)
    {
        return array_reduce(function ($age) {
            return $age->age();
          }, $people);

    }
}

// create some people
$carlton = new Person("Carlton", 25);
$ida = new Person("Ida", 32);
$estelle = new Person("Estelle", 57);
$jana = new Person("Jana", 48);

// create a house and put some peeps in
$house1 = new House();
$house1->addDweller($carlton)
       ->addDweller($ida);

// create another house and put some other peeps in
$house2 = new House();
$house2->addDweller($estelle)
       ->addDweller($jana);

// get back an array with all Person objects from the houses
// the actual output will be a bit messier
// but check it has the right number of people
var_dump(House::census([$house1, $house2])); // array(4) [$carlton, $ida, $estelle, $jana]
var_dump(House::census([$house2])); // array(2) [$estelle, $jana]

// return the average ages of the houses
var_dump(House::averageAge([$house1, $house2])); // float(40.5)
var_dump(House::averageAge([$house1])); // float(28.5)