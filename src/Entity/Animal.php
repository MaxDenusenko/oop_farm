<?php


namespace App\Entity;

use App\Base\Entity\Entity;

/**
 * Classes Animal
 * @package App\Entity
 */
class Animal extends Entity
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $registration_number;

    /**
     * @var Product[]
     */
    protected $products;

    /**
     * @param $registration_number
     * @return Animal
     */
    public static function create($registration_number)
    {
        $cow = new static();
        $cow->setRegistrationNumber($registration_number);
        return $cow;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product $product
     * @param int $amountFrom
     * @param int $amountTo
     * @return Animal
     */
    public function addProduct(Product $product, $amountFrom = 5, $amountTo = 10): self
    {
        $this->products[$product->getName()]['count'] += rand($amountFrom, $amountTo);
        $this->products[$product->getName()]['unit'] = $product->getUnit();
        return $this;
    }

    public function getName()
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
    public function getRegistrationNumber(): string
    {
        return $this->registration_number;
    }

    /**
     * @param string $registration_number
     */
    public function setRegistrationNumber(string $registration_number): void
    {
        $this->registration_number = $registration_number;
    }

    function validate(){}
}
