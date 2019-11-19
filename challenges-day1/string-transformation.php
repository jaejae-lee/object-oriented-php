<?php

class StringyRedux
{
    private $string; // not neccessary here as you dont keep track on the string input 

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function lower()
    {
        $this->string = strtolower($this->string);
        return $this; // because you chain methods you need to return this object not the transformed string itself
    }

    public function upper()
    {
        $this->string = strtoUpper($this->string);
        return $this;
    }

    public function append($newstr)
    {
        $this->string = "{$this->string}{$newstr}";
        return $this;
    }

    public function repeat($num)
    {
        $this->string = str_repeat($this->string, $num);
        return $this;
    }

    public function get()
    {
        return $this->string; // return fully transformed string at last
    }

}

$string1 = new StringyRedux("Oop");
var_dump($string1->lower()->repeat(2)->get()); // string(6) "oopoop"

$string2 = new StringyRedux("Spoon");
var_dump($string2->repeat(2)->upper()->append("!")->get()); // string(11) "SPOONSPOON!"

$string3 = new StringyRedux("Na");
var_dump($string3->repeat(2)->append(" ")->repeat(8)->append(" ")->append("Batman!")->get()); // string(48) "NaNa NaNa NaNa NaNa NaNa NaNa NaNa NaNa  Batman!"