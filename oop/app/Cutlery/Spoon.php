<?php
namespace App\Cutlery;

class Spoon
{
    protected $scooped = 0;

    public function scoop()
    {
        $this->scooped += 1;
        return $this;
    }

    public function howManyScoops()
    {
        return $this->scooped;
    }


}