<?php


namespace App\Base;


use App\Base\Entity\Application as BaseApplication;
use App\Base\Entity\Controller;
use App\Base\Entity\ControllerFactory;
use Exception;

class Application extends BaseApplication
{
    public $name;
    public $controllerName;
    public $actionName;

    /**
     * @var Controller
     */
    private $controller;

    /**
     * @param null $controller
     * @param null $action
     * @throws Exception
     */
    public function run($controller = null, $action = null)
    {
        $this->controllerName = $controller ? $controller : $this->_config['default_controller'];
        $this->actionName = $action ? $action : $this->_config['default_action'];

        $this->go();
    }

    /**
     * @throws Exception
     */
    private function go()
    {
        $this->init();
        $this->bootstrap();
        $this->end();
    }

    /**
     * @throws Exception
     */
    private function init()
    {
        $this->name = $this->_config['name'];

        $controller = ControllerFactory::create($this->controllerName);
        $this->setController($controller);
    }

    /**
     * @throws Exception
     */
    private function bootstrap()
    {
        $this->controller->callAction($this->getActionName());
    }

    private function end(){}

    /**
     * @param mixed $controller
     */
    public function setController($controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }
}
