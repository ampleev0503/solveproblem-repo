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
        echo $this->render("site/index");
    }
}