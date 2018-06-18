<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 22.04.2018
 * Time: 13:39
 */

namespace app\controllers;

use app\models\repositories\CategoryRepository;
use app\models\repositories\SubcategoryRepository;

class DefaultController extends Controller
{
    public function actionIndex() {

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

//        echo("<pre>");
//        var_dump($dataCategory);
//        exit;

        //var_dump((new SendMail())->accountActive('ampleev0503@ya.ru','VadimmmTASK','cdcd'));
        echo $this->render("site/index", ['dataCategory' => $dataCategory]);
    }
}