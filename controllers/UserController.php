<?php

namespace app\controllers;

use app\models\User;
use app\models\repositories\UserRepository;


class UserController extends Controller
{

    public function actionRegistration() {

        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $firstName = trim($_POST['firstName']);
            $lastName = trim($_POST['lastName']);
            $hashPass = md5(trim($_POST['password']));
            $passwordRepeat = md5(trim($_POST['password-repeat']));
            $telephone = trim($_POST['telephone']);

            //$email = null, $firstName = null, $lastName = null, $telephone = null, $hashPass = null, $id = null
            if($hashPass === $passwordRepeat)
            {
                $user = new User($email, $firstName, $lastName, $telephone, $hashPass);
                (new UserRepository())->insert($user);
                header('Location: /');
            } else {
                $errors[] = 'Пароли не совпадают';
            }
        }

        echo $this->render("user/registr", ['errors' => $errors]);
    }

    public function actionLogin() {

        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $hashPass = md5(trim($_POST['password']));

            $userId = UserRepository::checkUserData($email, $hashPass);

            //var_dump($user);

            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                //Запоминаем пользователя в сессию
                User::auth($userId);

                header('Location: /');
            }
        }

        echo $this->render("user/login", ['errors' => $errors]);

    }

    public function actionLogout() {
        unset($_SESSION['user']);
        //unset($_SESSION['products']);
        header("Location: /");
    }

}