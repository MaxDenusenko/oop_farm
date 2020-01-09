<?php


namespace App\Base\Entity;


use Exception;

abstract class Controller extends Base
{
    protected function beforeAction($actionName) {}

    protected function afterAction($actionName) {}

    /**
     * @param $actionName
     * @throws Exception
     */
    final public function callAction($actionName) {
        $realName = 'action' . ucfirst($actionName);
        if (is_callable([$this, $realName])) {
            $this->beforeAction($realName);
            $this->$realName();
            $this->afterAction($realName);
        } else {
            throw new Exception("The action $realName does not exist!");
        }
    }
}
