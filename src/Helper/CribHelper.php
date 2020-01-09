<?php


namespace App\Helper;


use App\Classes\Animal\Chicken;
use App\Classes\Animal\Cow;
use App\Classes\Product\Egg;
use App\Classes\Product\Milk;

trait CribHelper
{
    private $result_collection = [];

    /**
     * @return array
     */
    public function createAnimals()
    {
        $product_milk    = Milk::create();
        $product_egg     = Egg::create();

        $animals = [];

        $animal = Cow::create('1');
        $animal->addProduct($product_milk, 8, 12);
        $animals[] = $animal;

        $animal = Cow::create('2');
        $animal->addProduct($product_milk,8, 12);
        $animals[] = $animal;

        $animal = Chicken::create('1');
        $animal->addProduct($product_egg, 0, 1);
        $animals[] = $animal;

        $animal = Chicken::create('2');
        $animal->addProduct($product_egg, 0, 1);
        $animals[] = $animal;

        return $animals;
    }

    public function collection($animals)
    {
        if (is_array($animals) && count($animals) > 0) {
            foreach ($animals as $animal) {
                $products = $animal->getProducts();
                $this->addProductsToResult($products);
            }
        }
    }

    /**
     * @param array $products
     */
    private function addProductsToResult(array $products): void
    {
        if (count($products)) {
            foreach ($products as $productName => $product) {
                $this->result_collection[$productName]['count'] += $product['count'];
                $this->result_collection[$productName]['unit'] = $product['unit'];
            }
        }
    }

    public function viewResult($animals)
    {
        $result_view = '';
        $result_view .= "-------------------------------------------------------------------------------------\r\n";
        $result_view .= "В {$this->cribService->crib->getName()} добавлено " . count($animals) . " животных\r\n";
        $result_view .= "-------------------------------------------------------------------------------------\r\n";
        $result_view .= "Результат сбора продуктов:\r\n";
        $result_view .= "\r\n";

        foreach ($this->result_collection as $name => $value) {
            $result_view .= "$name\r\n";
            $result_view .= " {$value['count']} {$value['unit']}\r\n";
        }
        $result_view .= "-------------------------------------------------------------------------------------\r\n";

        echo $result_view;
    }
}
