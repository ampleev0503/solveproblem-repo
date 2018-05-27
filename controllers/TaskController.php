<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 18.05.2018
 * Time: 0:37
 */

namespace app\controllers;

use app\base\App;
use app\models\Task;
use app\models\repositories\TaskRepository;
use app\models\repositories\CategoryRepository;
use app\models\repositories\SubcategoryRepository;
use app\models\repositories\UserRepository;

use app\models\Authorization;

class TaskController extends Controller
{

    public function actionCreate()
    {

        // Если пользователь не авторизован, то перенаправляем на страницу авторизации
        if (!Authorization::authUser())
            header("Location: /login");

        $dataCategory = array(); // массив для хранения категорий и соответсвующих подкатегорий

        $itemsCategory = (new CategoryRepository())->getAll(); // получение всех категорий из бд
        $itemsSubcategory = (new SubcategoryRepository())->getAll(); // получение всех подкатегорий из бд

        /** @var \app\models\Category[] $itemsCategory */
        /** @var \app\models\Subcategory[] $itemsSubcategory */
        foreach ($itemsCategory as $category){
            foreach ($itemsSubcategory as $subcategory){
                if ($category->id == $subcategory->categoryId){
                    $dataCategory[$category->name][] = $subcategory->name;
                }
            }
        }

        // Проверяем: пришел ли аякс запрос на смену категории
        if (isset($_GET['action']) && $_GET['action'] == 'getSubcategory'){
            if (isset($dataCategory[$_GET['category']])){
                echo json_encode($dataCategory[$_GET['category']]); // возвращаем данные в JSON формате;
            }
            else{
                echo json_encode(array('Подкатегория'));
            }
            exit;
        }

        // Проверяем: была ли нажата кнопка "Опубликовать"
        if (isset($_POST['submitCreate'])) {

            $name = trim($_POST['nameTask']); // название задачи
            $description = trim($_POST['full-description']); // полное описание
            $startDate = date('Y-m-d' ,strtotime(($_POST['startDate']))); // предполагаемая дата начала выполнения
            $endDate = date('Y-m-d' ,strtotime(($_POST['endDate']))); // предполагаемая дата окончания выполнения
            $cost = trim($_POST['cost']); // стоимость работы
            $customerId = $_SESSION['id_user']; // заказчик
            $executorId = null; // исполнитель

            $subcategoryName = $_POST['subcategory'];
            foreach ($itemsSubcategory as $subcategory) {
                if ($subcategory->name == $subcategoryName) {
                    $subcategoryId = $subcategory->id; // id подкатегории из БД
                    break;
                }
            }

            $cityId = 1;

            $task = new Task($name, $description, $startDate, $endDate, $cost, $customerId, $executorId, $subcategoryId, $cityId);
            (new TaskRepository())->insert($task);

            header('Location: /');
        }

        echo $this->render("task/index", ['dataCategory' => $dataCategory]);
    }

    public function actionAll() {
        $itemsTask = (new TaskRepository())->getAll();
        $itemsCategory = (new CategoryRepository())->getAll();
        $itemsUser = (new UserRepository())->getAll();

        $dataUser = array(); // массив для хранения задач и соответсвующих пользователей

        /** @var \app\models\Task[] $itemsTask */
        /** @var \app\models\User[] $itemsUser */
        foreach ($itemsTask as $task){
            foreach ($itemsUser as $user){
                if ($task->customerId == $user->id){
                    $dataUser[$task->id][] = $user->id;
                    $dataUser[$task->id][] = $user->firstName;
                    $dataUser[$task->id][] = $user->lastName;
                }
            }
        }

        //echo("<pre>");
        //var_dump($dataUser);

        echo $this->render("task/all", ['itemsTask' => $itemsTask, 'itemsCategory' => $itemsCategory, 'dataUser' => $dataUser]);
    }

    public function actionCard() {
        $id = App::call()->request->get('id');
        $task = (new TaskRepository())->getOne($id);

        $customer = (new UserRepository())->getOne($task['customerId']);
        $subcategory = (new SubcategoryRepository())->getOne($task['subcategoryId']);

        echo $this->render("task/card", ['task' => $task, 'customer' => $customer, 'subcategory' => $subcategory]);
    }

}