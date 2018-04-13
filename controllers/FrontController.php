<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 06.04.2018
 * Time: 14:58
 */

namespace app\controllers;

use app\services\Request;
use app\services\RequestClassException;

require_once "../config/main.php";


/// Единая точка входа
class FrontController
{
    private $controllerName;                //имя контролера
    private $defaultController = 'test';    //имя контроллера по умолчанию !!тестовое!! -(заменить)
    private $actionName;                    //актион

  public function runAction()
  {
    $this->autoloader();                   // запускаем автолоадер
    $request = new Request();             //сервис обработки URL запроса
    $this->controllerName = $request->getControllerName()?:$this->defaultController; //получаем контролер
    $this->actionName = $request->getActionName(); //получаем имя действия

      //преобразуем строку к виду app\controllers\ИмяконтролераController
      $controllerClass = NAMESPACE_CONTROLLERS . ucfirst($this->controllerName) . 'Controller';


      try {
          $controller = new $controllerClass();                       //создаем класс контрорлера
      } catch (RequestClassException $e) {
          $controllerClass = NAMESPACE_CONTROLLERS.'ErrorController'; //если контролера не существует
          $controller = new $controllerClass();                             //отлавливаем исключение
          $this->actionName = "notFound";                             //пользователь отправляется на
                                                                          //страницу "NOT FOUND"
      }
      $controller->render($this->actionName);  //рендер страницы происходит в классе Controller
  }


    //Автозагрузчик
    public function autoloader()
    {
        require_once "../services/Autoloader.php";
        spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);
    }

}