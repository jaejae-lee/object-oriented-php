<?php
namespace App\Shapes;

Class Rectangle implements ShapeInterface
{
    private $width;
    private $height;

    public function __construct ($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function area ()
    {
        return ($this->width)*($this->height);
    }

}