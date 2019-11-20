<?php

namespace App;

class Person
{
    private $firstname;
    private $lastname;

    public function __construct($firstname, $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function fullName ()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function sayHelloTo (Person $person)
    {
        return "hello {$person->fullname()}";
    }

}