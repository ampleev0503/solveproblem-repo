<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 10.01.2018
 * Time: 17:52
 */

namespace app\controllers;


class ErrorController extends Controller
{

    public function actionRequest() {
        echo $this->render("error/request", ['message' => "Ошибка в запросе"]);
    }

}