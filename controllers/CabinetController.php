<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 14.06.2018
 * Time: 15:27
 */

namespace app\controllers;

use app\base\App;
use app\models\Feedback;
use app\models\repositories\FeedbackRepository;
use app\models\Task;
use app\models\repositories\TaskRepository;
use app\models\Authorization;

class CabinetController extends Controller
{

    public function actionIndex()
    {
        // Если пользователь не авторизован, то перенаправляем на страницу авторизации
        if (!Authorization::authUser())
            header("Location: /login");

        // получаем все отклики авторизованного пользователя
        $itemsTask = (new TaskRepository())->getTasksByPotentialExecutor($_SESSION['id_user']);

        $itemsTaskCustomer = (new TaskRepository())->getTasksByCustomer($_SESSION['id_user']);


        echo $this->render("cabinet/index", ['itemsTask' => $itemsTask, 'itemsTaskCustomer' => $itemsTaskCustomer]);
    }

    public function actionDoAsExecutor()
    {
        if (isset($_POST['submit'])) {
            //echo($_POST['id'] . ' ' . $_POST['executorId'] . '!!!');
            $task = (new TaskRepository())->getOne($_POST['id']);
            $task->statusId = 2;
            $task->executorId = $_POST['executorId'];
            echo((new TaskRepository())->update($task));
        }
    }

    public function actionFinishTask()
    {
        if (isset($_POST['submit'])) {
            $task = (new TaskRepository())->getOne($_POST['id']);
            $task->statusId = 3;
            echo((new TaskRepository())->update($task));
        }
    }

    public function actionChangeExecutor()
    {
        if (isset($_POST['submit'])) {
            $task = (new TaskRepository())->getOne($_POST['id']);
            $task->statusId = 1;
            $task->executorId = null;
            echo((new TaskRepository())->update($task));
        }
    }

    public function actionReview()
    {
        // Если пользователь не авторизован, то перенаправляем на страницу авторизации
        if (!Authorization::authUser())
            header("Location: /login");

        if (isset($_POST['submit'])) {
            $id = App::call()->request->get('id');
            $task = (new TaskRepository())->getOne($id);

            //var_dump($_POST['reviewStars'], 'Пробел', $_POST['txtArea']);

            if($_SESSION['id_user'] != $task->customerId) {
                header("Location: /");
            } else {
                $feedback = new Feedback($_POST['reviewStars'], $_POST['txtArea'], $id);
                //var_dump($feedback);
                (new FeedbackRepository())->insert($feedback);
                header("Location: /");
            }

        }


        echo $this->render("cabinet/review");
    }





}