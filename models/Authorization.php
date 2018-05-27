<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 12.12.2017
 * Time: 13:53
 */

namespace app\models;


use app\models\repositories\AuthorizationRepository;
use app\models\repositories\UserRepository;
use app\models\User;
use app\models\GenerateUrl;
use app\models\repositories\GenerateUrlRepository;
use app\base\App;
use app\services\SendMail;

class Authorization extends DataEntity
{

    public static function login($login, $password, $remember = null)
    {

      $user = (new UserRepository())->getUser($login);

      $error  = 'notregist';//такой пользователь не зарегистрирован
      if ($user) {

        $error = 'active'; //пользователь не активировал акаунт
        if ($user->isregist) {

          $error = 'pass'; //пользователь не верно ввел пароль
          if ($user->password == md5($password)) {
            if ($remember) {
              setcookie('id_user', $user->id, App::call()->config['TIME_MONTH'], '/');
              setcookie('login', $user->login, App::call()->config['TIME_MONTH'], '/');
              setcookie('password', $user->password, App::call()->config['TIME_MONTH'], '/');
              $_SESSION['id_user'] = $user->id;
              $_SESSION['login'] = $user->email;
              $_SESSION['password'] = $user->password;
              $_SESSION['role'] = $user->getRole();
              $error = false;
            } else {
              $_SESSION['id_user'] = $user->id;
              $_SESSION['login'] = $user->email;
              $_SESSION['password'] = $user->password;
              $_SESSION['role'] = $user->getRole();
              $error = false;
            }
          }
        }
      }
        return $error;
    }

    public static function registration($login, $password, $firstName,$lastName,$phone)
    {
        $result = false;
        $hashPassword = md5($password);

        if (!(new UserRepository())->getUser($login)) {

            $user = new User($login, $firstName,$lastName,$phone,$hashPassword);
            if ((new UserRepository())->insert($user)) {
              $user = (new AuthorizationRepository())->getUser($login);
              (new UserRepository())->addRole($user->id);
              $url = (new GenerateUrl($user->email))->activeRegist();
              (new SendMail())->accountActive($user->email,$user->firstName,$url);
              $result = true;
              //var_dump($result);
            }
        }
        return $result;
    }

  public static function activeAccount($login,$path)
  {
    $result;

    $user = (new UserRepository())->getUser($login);
    if ($user->isregist == '0'){
      $serverPath = (new GenerateUrlRepository())->checkActivePath($login);
      if ($path === $serverPath) {
        $user->isregist = 1;
        (new UserRepository())->update($user);
        $result = true;
      }
    }else{
      $result =  false;
    }
    return $result;
  }

  public static function forgetPassword($login)
  {
    $result = 1;
    $user = (new UserRepository())->getUser($login);
    if ($user){
      $url = (new GenerateUrl($login))->forgetPas();
      (new SendMail())->forgetPassword($user->email,$user->firstName,$url);
    }else{
      $result = 0;
    }
    return $result;
  }

  public static function newPassword($login,$password)
  {
    $user = (new UserRepository())->getUser($login);
    $user->password = md5($password);
    return (new UserRepository())->update($user);
  }

    public static function logout()
    {
        setcookie('id_user', "", -App::call()->config['TIME_MONTH'], '/');
        setcookie('login', "", -App::call()->config['TIME_MONTH'], '/');
        setcookie('password', "", -App::call()->config['TIME_MONTH'], '/');
        unset($_SESSION['id_user'], $_SESSION['login'], $_SESSION['password'], $_SESSION['role']);
        session_destroy();
        return true;
    }


    // Проверка авторизованн ли пользователь
  public static function authUser()
  {

    $result = false;

    if (!empty($_SESSION['login']) && !empty($_SESSION['password'])
      && !empty($_SESSION['role'])
    ) {
      $result = true;

    } elseif (!empty($_COOKIE['login']) && !empty($_COOKIE['password'])) {
      $result = static::checkCookie($_COOKIE['login'], $_COOKIE['password']);
    }

    return $result;
  }


  //Проверка куки запись из куки в сесию
  public static function checkCookie($login, $password)
    {
        $result = false;

        $user = (new UserRepository())->getUser($login);
        if ($user->password == $password) {
            $_SESSION['id_user'] = $user->id;
            $_SESSION['login'] = $user->email;
            $_SESSION['password'] = $user->password;
            $_SESSION['role'] = $user->getRole();
            $result = true;
        }
        return $result;
    }
}