<?php


namespace App\Classes\Product;


use App\Entity\Product;

class Milk extends Product
{
    public function __construct()
    {
        $this->setName('Milk');
        $this->setUnit(Product::UNIT_LITER);
    }
}
