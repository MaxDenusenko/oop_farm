<?php


namespace App\Base\Entity;


abstract class Entity extends Base
{
    public $errors = [];

    abstract function validate();

    /**
     * @param EntityError $error
     */
    public function addError(EntityError $error): void
    {
        $this->errors[] = $error;
    }

    /**
     * @return bool
     */
    public function hasErrors(): bool
    {
        if (count($this->errors) > 0) {
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
