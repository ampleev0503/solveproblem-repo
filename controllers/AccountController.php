<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 02.05.2018
 * Time: 12:01
 */

namespace app\controllers;


use app\models\Authorization;

class AccountController extends Controller
{
  // Активация аккаунта
  public function actionActive()
  {
      $login = trim($_GET['login']);
      $path = trim($_GET['path']);

      if (Authorization::activeAccount($login, $path)) {
        echo $this->render('user/active');
      }else{
        header('location: /');
      }
  }

  // Востановление пароля
  public function actionForget()
  {
    return '#';
  }

}