<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 18.06.2018
 * Time: 12:05
 */

namespace app\controllers;


use app\models\repositories\FeedbackRepository;
use app\models\repositories\UserRepository;
use app\base\App;

class UserController extends Controller
{

    public function actionIndex() {
        $id = App::call()->request->get('id');
        $user = (new UserRepository())->getOne($id);

        $itemsFeedback = (new FeedbackRepository())->getFeedbacks($id);

        //var_dump($itemsFeedback);

        echo $this->render('user/profile', ['user' => $user, 'itemsFeedback' => $itemsFeedback]);
    }

}