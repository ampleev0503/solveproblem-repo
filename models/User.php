<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 22.04.2018
 * Time: 15:07
 */

namespace app\models;


class User extends DataEntity
{
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $telephone;
    public $hashPass;


    public function __construct($email = null, $firstName = null, $lastName = null, $telephone = null, $hashPass = null, $id = null)
    {
        $this->id;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->telephone = $telephone;
        $this->hashPass = $hashPass;
    }

    public static function auth($userId) {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged() {
        //Если есть сессия, то возвращаем id пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        // Если сессии не будет, то перенаправляем на авторизацию
        header('Location: /user/login');
    }

    public static function isGuest() {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

}