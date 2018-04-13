<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 06.04.2018
 * Time: 22:33
 */

namespace app\controllers;

//Родительский контролер, рендерит страницы
abstract class Controller
{

    protected $layout = true;  // главный шаблон
    protected $action;         //действие
    protected $content = [];    // контент вложеного шаблона
    protected $defaultAction = 'index'; //страница по умолчанию



    public function render($action)
    {
        $this->action = $action ?: $this->defaultAction;  //получаем действие
        $method = 'action'.ucfirst($this->action);        //преобразовываем к виду actionIndex
        $this->content = $this->$method();               //Получаем контент вложеного шаблона

        if ($this->layout){
            //рендер с главным шаблоном
           echo $this->renderTemplate('layouts/main',['content'=>$this->content]);
        }else{
            //рендер только вложеного шаблона
            echo $this->content;
        }
    }


    /*
  рендеринг шаблона
  $template - имя шаблона
  $params - даные
   @return шаблон
  */
    public function renderTemplate($template, $params=[])
    {
        return (new \app\services\TemplateRender())->render($template, $params);
    }

    //при вызове несуществующего action уводит на страницу "not found"
    public function __call($name, $params)
    {
        $this->layout = false;
        return $this->renderTemplate('error/notfound');
    }

}