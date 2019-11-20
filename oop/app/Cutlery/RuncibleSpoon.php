<?php
namespace App\Cutlery;

class RuncibleSpoon extends Spoon
{
    public function scoop()
    {
        $this->scooped += 2;
        return $this;
        // parent::scoop(); // the original function
        // $this->scooped += 1; // add more 
        return $this;
    }
}

