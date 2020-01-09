<?php


namespace App\Base\Entity;


use Exception;

class ControllerFactory
{
    /**
     * @param $controllerName
     * @return mixed
     * @throws Exception
     */
    public static function create($controllerName) {
        $className = "App\Controller\\" . ucfirst($controllerName) . 'Controller';

        if (!class_exists($className)) {
            throw new Exception("Classes $className not founded!");
        }
        return new $className();
    }

}
