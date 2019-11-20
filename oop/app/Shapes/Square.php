<?php
namespace App\Shapes;

class Square implements ShapeInterface
{
    private $side_length;
   
    public function __construct($side_length)
    {
        $this->side_length = $side_length;
    }

    public function area()
    {
        return pow($this->side_length, 2);
    }

}
