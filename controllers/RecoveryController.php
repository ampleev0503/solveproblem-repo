<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 17.05.2018
 * Time: 15:50
 */

namespace app\controllers;

use app\models\Authorization;
class RecoveryController extends Controller
{

  public function actionIndex()
  {
    if ($_POST['email']){
      $mail = trim($_POST['email']);
      $result = Authorization::forgetPassword($mail);
      echo $result;
    }else {
      echo $this->render('user/password-recovery');
    }
  }
}