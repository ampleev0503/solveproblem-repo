<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 24.04.2018
 * Time: 14:26
 */

namespace app\controllers;
use app\models\Authorization;


class RegistController extends Controller
{

  public function actionIndex() {

    if (isset($_POST['submit'])) {
      $email = trim($_POST['email']);
      $firstName = trim($_POST['firstName']);
      $lastName = trim($_POST['lastName']);
      $password = trim($_POST['password']);
      $telephone = trim($_POST['telephone']);

      //var_dump($email,$firstName,$lastName,$password,$telephone);die();
      if (Authorization::registration($email, $password,$firstName,$lastName,$telephone)) {
          echo '1';
        }else{
          echo '0';
        };

    }else {
      echo $this->render("user/registr");
    }
  }
}