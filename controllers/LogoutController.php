<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 27.04.2018
 * Time: 11:58
 */

namespace app\controllers;

use app\models\Authorization;

class LogoutController extends Controller
{
  public function actionIndex()
  {
    $checkUser = Authorization::authUser();
    if ($checkUser) {
      Authorization::logout();
    }
    header("Location: /");
  }
}