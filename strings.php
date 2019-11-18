<?php

class Stringy
{
    private $string;

    public function __construct($string)
    {
        $this->string = $string;
        return $this;
    }

    public function lower()
    {
        return strtolower($this->string);
    }

    public function upper()
    {
        return strtoUpper($this->string);
    }

    public function append($newstr)
    {
        return "{$this->string}{$newstr}";
    }

    public function repeat($num)
    {
        return str_repeat($this->string, $num);
    }

}

$string = new Stringy("Na");

// it can lowercase a string
var_dump($string->lower()); // string(2) "na"

// it can uppercase a string
var_dump($string->upper()); // string(2) "NA"

// it can concatenate
var_dump($string->append("blah")); // string(6) "Nablah"

// it can repeat a string
var_dump($string->repeat(5)); // string(10) "NaNaNaNaNa"