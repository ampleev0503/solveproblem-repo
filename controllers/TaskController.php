<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 18.05.2018
 * Time: 0:37
 */

namespace app\controllers;

use app\models\Task;
use app\models\repositories\TaskRepository;

class TaskController extends Controller
{

    public function actionIndex()
    {
        echo $this->render("task/index");
    }

    public function actionCreate()
    {
        $task = new Task('тестовая задача 1', 'Починить iphone', '19.05.2018','21.05.2018', 500, 4, 3, 1, 1);

    }

}