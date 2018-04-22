<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 15.12.2017
 * Time: 17:28
 */

namespace app\controllers;


use app\interfaces\IRenderer;
use app\services\renderers\TemplateRenderer;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    protected $useLayout = false;

    // здесь будет храниться экземпляр текущего рендеринга
    private $renderer;


    public function __construct(IRenderer $renderer = null)
    {
        $this->renderer = $renderer;
    }


    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else
            echo "404";

    }


    //определяем: с лэйаутом рендерить страницу или без него
    public function render($template, $params = []) {

        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}",
                ['content' => $this->renderTemplate($template, $params)]);
        }else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {

        //здесь уже вызывается метод render($template, $params) из классов шаблона рендеринга (папка renderers)
        return $this->renderer->render($template, $params);
    }

}