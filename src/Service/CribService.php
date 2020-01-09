<?php


namespace App\Service;


use App\Entity\Animal;
use App\Entity\Crib;

class CribService
{
    /**
     * @var Crib
     */
    public $crib;

    public function __construct()
    {
        $this->crib = Crib::getInstance();
    }

    /**
     * @param string $name
     */
    public function edit(string $name): void
    {
        $this->crib->edit($name);
    }

    /**
     * @param Animal $animal
     */
    public function addAnimal(Animal $animal): void
    {
        $this->crib->addAnimal($animal);
    }

    /**
     * @param array $animals
     */
    public function addAnimals(array $animals): void
    {
        if (count($animals)) {
            foreach ($animals as $animal) {
                $this->addAnimal($animal);
            }
        }
    }

    /**
     * @return array
     */
    public function getAnimals(): array
    {
        return $this->crib->getAnimals();
    }
}
