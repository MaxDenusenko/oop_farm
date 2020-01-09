<?php

namespace App\Entity;

use App\Base\Entity\Entity;

/**
 * Classes Crib
 * @package App\Entity
 */
class Crib extends Entity
{
    /**
     * @var self
     */
    private static $instance = null;

    /**
     * @return Crib
     */
    public static function getInstance(): Crib
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct(){}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    private function __clone(){}
    private function __wakeup(){}

    /**
     * @var string
     */
    private $name;

    /**
     * @var Animal[]
     */
    private $animals;

    /**
     * @return Animal[]
     */
    public function getAnimals(): array
    {
        return $this->animals;
    }

    /**
     * @param Animal $animal
     */
    public function addAnimal(Animal $animal): void
    {
        if (is_array($this->animals) && count($this->animals)) {
            foreach ($this->animals as $localAnimal) {
                if ($localAnimal->getRegistrationNumber() == $animal->getRegistrationNumber() && $localAnimal->getName() == $animal->getName()) {
                    return;
                }
            }
        }

        $this->animals[] = $animal;
    }

    /**
     * @param int $animalCode
     * @return bool
     */
    public function removeAnimal(int $animalCode): bool
    {
        if (is_array($this->animals) && count($this->animals)) {
            foreach ($this->animals as $i => $animal) {
                if ($animal->getRegistrationNumber() == $animalCode) {
                    unset($this->animals[$i]);
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @param $name
     */
    public function edit($name): void
    {
        $this->name = $name;
    }

    function validate(){}
}
