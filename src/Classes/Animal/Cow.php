<?php


namespace App\Classes\Animal;


use App\Entity\Animal;

class Cow extends Animal
{
    public function __construct()
    {
        $this->setName('Cow');
    }
}
