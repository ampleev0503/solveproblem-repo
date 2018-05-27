<?php
namespace app\controllers;

use app\base\App;
use app\services\ParseRequestException;
use app\services\RequestClassException;
use app\services\Request;

class FrontController
{
    private $currentController;
    private $currentAction;

    private $defaultController = 'default';

    public function runController()
  {
    $request = App::call()->request;
    $controllerName = $request->getControllerName() ?: $this->defaultController;
    $actionName = $request->getActionName();

    $controllerClass = App::call()->config['controllers_namespaces'] . ucfirst($controllerName) . "Controller";

    try{
      $controller = new $controllerClass(
        new \app\services\renderers\TemplateRenderer()
      );
    }catch (RequestClassException $e) {
      $controllerClass = App::call()->config['controllers_namespaces'].'ErrorController';
      $controller = new $controllerClass(
        new \app\services\renderers\TemplateRenderer()
      );
      $actionName = "notFound";
    }
      $controller->runAction($actionName);
  }
}