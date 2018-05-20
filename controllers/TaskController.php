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
use app\models\repositories\CategoryRepository;
use app\models\repositories\SubcategoryRepository;

class TaskController extends Controller
{

    public function actionIndex()
    {

        $dataCategory = array(); // массив для хранения категорий и соответсвующих подкатегорий

        $itemsCategory = (new CategoryRepository())->getAll(); // получение всех категорий из бд
        $itemsSubcategory = (new SubcategoryRepository())->getAll(); // получение всех подкатегорий из бд

        /** @var \app\models\Category[] $itemsCategory */
        /** @var \app\models\Subcategory[] $itemsSubcategory */
        foreach ($itemsCategory as $category)
        {
            foreach ($itemsSubcategory as $subcategory)
            {
                if ($category->id == $subcategory->categoryId)
                {
                    $dataCategory[$category->name][] = $subcategory->name;
                }
            }
        }

            // Проверяем: пришел ли аякс запрос на смену категории
        if (isset($_GET['action']) && $_GET['action'] == 'getSubcategory')
        {
            if (isset($dataCategory[$_GET['category']]))
            {
                echo json_encode($dataCategory[$_GET['category']]); // возвращаем данные в JSON формате;
            }
            else
            {
                echo json_encode(array('Подкатегория'));
            }

            exit;
        }

        echo $this->render("task/index", ['dataCategory' => $dataCategory]);
    }

}