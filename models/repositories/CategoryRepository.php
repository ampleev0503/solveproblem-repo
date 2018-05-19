<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 20.05.2018
 * Time: 1:43
 */

namespace app\models\repositories;


use app\models\Repository;
use app\models\Category;

class CategoryRepository extends Repository
{
    public static function getTableName()
    {
        return 'category';
    }

    public static function getEntityClass()
    {
        //возвратит полное имя класса с пространством имён
        return Category::class;
    }
}