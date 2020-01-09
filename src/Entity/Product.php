<?php


namespace App\Entity;


use App\Base\Entity\Entity;

/**
 * Classes Product
 * @package App\Entity
 */
class Product extends Entity
{
    const UNIT_PIECE = 'pcs.';
    const UNIT_LITER = 'l.';
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $unit;

    /**
     * @return Product
     */
    public static function create()
    {
        return new static();
    }

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

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     */
    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

    function validate(){}
}
