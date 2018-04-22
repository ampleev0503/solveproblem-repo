<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 05.01.2018
 * Time: 18:35
 */

namespace app\services;

class ParseRequestException extends \Exception{}


class Request
{

    private $requestString;
    private $controllerName;
    private $actionName;
    private $params;

    private $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }


    private function parseRequest() {



        //вернет единицу, если поиск успешный и ноль, если ничего не нашлось
        //если указываем третий параметр, то в него извлекутся все найденные строки
        if (preg_match_all($this->pattern, $this->requestString, $matches)) {
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
            $this->params = $_REQUEST;
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function get($name)
    {
        if (key_exists($name, $this->params))
        {
            return $this->params[$name];
        }
        return null;


    }

}