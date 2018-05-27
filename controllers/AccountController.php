<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 02.05.2018
 * Time: 12:01
 */

namespace app\controllers;


use app\models\Authorization;
use app\models\repositories\GenerateUrlRepository;
use app\models\repositories\UserRepository;

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
  public function actionRecovery()
  {
    if ($_POST['password']) {
      $password = trim($_POST['password']);
      $login = trim($_POST['login']);
      $result = Authorization::newPassword($login,$password);
      echo $result;
    }else {
      $path = trim($_GET['path']);
      $login = (new GenerateUrlRepository())->checkForgetPath($path);
      if ($login) {
        echo $this->render('user/newpassword', ['login' => $login]);
      } else {
        header('location: /');
      }
    }
  }
}