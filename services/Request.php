<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 06.04.2018
 * Time: 21:29
 */

namespace app\services;

class Request
{
 
    private $requestString;  //запрашиваемая строка
    private $controllerName; //имя контролера
    private $actionName;     //акшион

    //шаблон поиска
    private $pattern = "#[/]?(?P<controller>\w+)?[/]?(?P<action>\w+)?[/]?#ui";

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI']; //записываем URL строку
        $this->parseRequest();
    }

    //разбиваем URL на controller, action
    private function parseRequest()
    {
        preg_match_all($this->pattern,$this->requestString, $matches);
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

}