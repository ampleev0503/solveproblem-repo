<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 22.04.2018
 * Time: 13:39
 */

namespace app\controllers;
class DefaultController extends Controller
{
    public function actionIndex() {
        //var_dump((new SendMail())->accountActive('ampleev0503@ya.ru','VadimmmTASK','cdcd'));
        echo $this->render("site/index");
    }
}