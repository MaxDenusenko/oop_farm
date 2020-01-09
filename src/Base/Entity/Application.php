<?php


namespace App\Base\Entity;


abstract class Application extends Base
{
    /**
     * @var array
     */
    protected $_config;
    /**
     * @var self
     */
    protected static $_app;

    /**
     * @param array $config
     */
    private function __construct($config = []) {
        $this->_config = $config;
        Application::$_app = $this;
    }

    private function __clone() {}
    private function __wakeup() {}

    static function app() {
        return self::$_app;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getConfig($name) {
        return $this->_config[$name];
    }

    protected static $instance = null;

    /**
     * @param array $config
     * @return Application
     */
    public static function getInstance($config = []): self
    {
        if (static::$instance === null) {
            static::$instance = new static($config);
        }

        return static::$instance;
    }

    abstract public function run($controller, $action);
}
