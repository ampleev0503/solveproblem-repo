<?php

namespace app\controllers;

use app\models\User;
use app\models\repositories\UserRepository;
//use app\services\Request;
//use app\models\repositories\CategoryRepository;

class UserController extends Controller {

    public function actionLogin() {

        $this->setLayout('mainPromo');
        return $this->renderTemplate("user/login", []);
     //   echo $this->render("login", []);
    }

    public function actionlogout() {
        session_start();
        session_unset();
        session_destroy();
        $items = (new CategoryRepository())->getAll();
        echo $this->render("product/index", ['items' => $items]);
    }

    /* Проверка пользователя пароля */

    public function actionloginControl() {

        if (isset($_POST['email'])) {
            $email = stripslashes($_POST['email']);
            $email = htmlspecialchars($email);
        }
        if (isset($_POST['password'])) {
            $Pass = stripslashes($_POST['password']);
            $Pass = htmlspecialchars($Pass);
        }
        $items = (new UserRepository())->getAll();
        foreach ($items as $item):
            if ($item["user_login"] == $email and $item["user_password"] == md5(md5($Pass))) {
                session_start();

                $_SESSION['AUTHORIZED'] = 1;
                $_SESSION['USER_NAME'] = $item["user_name"];
                $_SESSION['USER_ID'] = $item["id"];
                var_dump($_SESSION);
                return;
            }

        endforeach;
        header('HTTP/1.0 400 Bad Request');
    }

    public function actionRegistrate() {

        $user = (new userRepository());
        echo $this->render("user/registrate", ['user' => $user]);
    }

    public function actionAddUser() {
        if (isset($_POST['name'])) {
            $form_name = stripslashes($_POST['name']);
            $form_name = htmlspecialchars($form_name);
        }
        if (isset($_POST['email'])) {
            $email = stripslashes($_POST['email']);
            $email = htmlspecialchars($email);
        }
        if (isset($_POST['password'])) {
            $password = stripslashes($_POST['password']);
            $password = htmlspecialchars($password);
            $password = md5(md5($password));
        }
        if (isset($_POST['bdate'])) {
            $bdate = stripslashes($_POST['bdate']);
            $bdate = htmlspecialchars($bdate);
        }

        if (isset($_POST['phone'])) {
            $phone = stripslashes($_POST['phone']);
            $phone = htmlspecialchars($phone);
        }

        if (isset($_POST['аddress'])) {
            $аddress = $_POST['аddress'];
        }
        var_dump($_POST);
        $userRepo = (new userRepository());

        $user = new user(null, $form_name, $email, $password, null, $bdate, $email, $phone, $аddress);

        $userRepo->insert($user);
    }

}
