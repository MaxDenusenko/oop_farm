<?php


namespace App\Classes\Animal;


use App\Entity\Animal;

class Chicken extends Animal
{
    public function __construct()
    {
        $this->setName('Chicken');
    }
}
