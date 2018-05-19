<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 24.04.2018
 * Time: 13:46
 */

namespace app\controllers;

use app\models\Authorization;
class LoginController extends Controller
{

  public function actionIndex() {

    if (isset($_POST['submit'])) {
      $email = trim($_POST['email']);
      $password = trim($_POST['password']);

        $auth = Authorization::login($email,$password,$_POST['remember']);
        if ($auth){
          echo $auth;
        }
    }else{
        echo $this->render("user/login");
    }
  }


}