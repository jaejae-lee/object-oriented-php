<?php
namespace App\Cutlery;

class RuncibleSpoon extends Spoon
{
    public function scoop()
    {
        // $this->scooped += 2;
        // return $this;
        parent::scoop(); 
        $this->scooped += 1;
        return $this;
    }

}

