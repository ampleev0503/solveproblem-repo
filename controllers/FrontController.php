<?php
namespace app\controllers;

use app\base\App;
use app\services\ParseRequestException;
use app\services\Request;

class FrontController extends Controller
{
    private $currentController;
    private $currentAction;

    private $defaultController = 'default';

    public function actionIndex()
    {
        try {
            $request = App::call()->request;
            $controllerName = $request->getControllerName() ?: $this->defaultController;
            $actionName = $request->getActionName();
        } catch (ParseRequestException $e) {
            $controllerName = "error";
            $actionName = "request";
        }

        $controllerClass = App::call()->config['controllers_namespaces'] . ucfirst($controllerName) . "Controller";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(
                new \app\services\renderers\TemplateRenderer()
            );
            $controller->runAction($actionName);
        }
    }
}