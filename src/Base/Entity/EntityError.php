<?php


namespace App\Base\Entity;


abstract class EntityError
{
    public $attribute;

    public $message;
    /**
     * @param $attribute
     * @param $message
     */
    public function __construct($attribute, $message) {
        $this->attribute = $attribute;
        $this->message = $message;
    }
}
