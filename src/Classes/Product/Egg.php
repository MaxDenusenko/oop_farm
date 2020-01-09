<?php


namespace App\Classes\Product;


use App\Entity\Product;

class Egg extends Product
{
    public function __construct()
    {
        $this->setName('Egg');
        $this->setUnit(Product::UNIT_PIECE);
    }
}
