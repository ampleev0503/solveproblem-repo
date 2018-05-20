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

        //echo("<pre>");
        //var_dump($dataCategory);

        echo $this->render("task/index", ['dataCategory' => $dataCategory]);
    }

    public function actionCreate()
    {
        //$task = new Task('тестовая задача 1', 'Починить iphone', '19.05.2018','21.05.2018', 500, 4, 3, 1, 1);

    }

}