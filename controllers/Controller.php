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
use app\models\Authorization;

abstract class Controller
{
    private $action;
    private $layoutContent;  // контент хоторый будет в главном шаблоне
    protected $layout = 'main';
    protected $defaultAction = 'index';
    protected $useLayout = true;
    protected $authUser;


  // здесь будет храниться экземпляр текущего рендеринга
    private $renderer;


    public function __construct(IRenderer $renderer = null)
    {
        $this->renderer = $renderer;
        $this->layoutContent = $this->layoutContent();  // подгружаем даные для layout
    }

    // Функция для контента который будет в layouts
    public function layoutContent()
    {
        $layoutArr = [];
        $layoutArr['authUser'] = Authorization::authUser();   // Проверяем авторизован ли ползователь
        return $layoutArr;
    }

    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        $this->$method();
    }

    //определяем: с лэйаутом рендерить страницу или без него
    public function render($template, $params = []) {
      if ($this->useLayout) {
        return $this->renderTemplate("layouts/{$this->layout}",
                ['layoutContent'=> $this->layoutContent,'content'=>$this->renderTemplate($template, $params)]);
        }else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {

        //здесь уже вызывается метод render($template, $params) из классов шаблона рендеринга (папка renderers)
        return $this->renderer->render($template, $params);
    }

    //если был введен несуществующий экшн
    public function __call($name, $params)
    {
      $this->useLayout = false;
      echo $this->render("error/notfound");
    }

//    abstract public function getStyle();
}