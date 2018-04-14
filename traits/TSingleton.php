<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 14.04.2018
 * Time: 16:15
 */

namespace app\traits;


trait TSingleton
{
    private static $instance = null;

    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}

    public static function getInstance()
    {
        if(is_null(static::$instance)){
            // new static() равносильно (в контексте класса Db) new Db() - создает экземпляр текущего класса, как и self
            // static::$instance - обращение к статическому свойству текущего класса.
            static::$instance = new static();
            //echo "создал соединение";
        }
        return static::$instance;
    }
}