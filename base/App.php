<?php

namespace app\base;

include "../traits/TSingleton.php";


/**
 * Class App
 * @package app\base
 * @property \app\controllers\Controller $mainController
 * @property \app\services\Request $request
 * @property \app\services\Db $db
 */

class App
{

    use \app\traits\TSingleton;


    public $config;

    /** @var  Storage */
    public $components;

    //просто для удобства (чтобы не писать getInstance мф будем писа+ть call)
    //то есть через этот метод будем вызывать экземпляр своего приложения
    //который будет всегда один единственный
    /** @return static */
    public static function call()
    {
        return static::getInstance();
    }


    public function run()
    {
        session_start();
        $this->config = include "../config/main.php";
        $this->autoloadRegister();
        $this->components = new Storage();
        $this->mainController->runAction();

    }

    private function autoloadRegister()
    {
        require "../services/Autoloader.php";
        //require "../vendor/autoload.php";
        spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);
    }

    public function createComponent($name)
    {
        if(isset($this->config['components'][$name])){
            $params = $this->config['components'][$name];
            $className = $params['class'];
            if(class_exists($className)){
                unset($params['class']);
                $reflection = new \ReflectionClass($className);
                return $reflection->newInstanceArgs($params);
            }
        }
        return null;
    }

    //перехват доступа к свойствам которых нет
    //допустим запрашиваем свойствой mainController, а его нет тут
    //поэтому сработает этот метод
    function __get($name)
    {
        return $this->components->get($name);
    }

}