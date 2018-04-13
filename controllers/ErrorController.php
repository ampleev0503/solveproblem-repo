<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 07.04.2018
 * Time: 11:04
 */

namespace app\controllers;

//контроллер ошибок
class ErrorController extends Controller
{
    protected $layout = false;

    public function actionIndex()
    {
      //заглушка
          return false;
    }

  //Страница не найдена
    public function actionNotfound()
    {
        return $this->renderTemplate('error/notfound');
    }
}