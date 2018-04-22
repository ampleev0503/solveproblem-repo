<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 06.04.2018
 * Time: 22:32
 */

namespace app\controllers;

//ТЕСТОВЫЙ контроллер
class TestController extends Controller
{

    public function actionIndex()
    {
        echo $this->renderTemplate('test');
    }

}