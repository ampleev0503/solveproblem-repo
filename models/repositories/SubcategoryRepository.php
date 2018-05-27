<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 20.05.2018
 * Time: 1:55
 */

namespace app\models\repositories;


use app\models\Repository;
use app\models\Subcategory;

class SubcategoryRepository extends Repository
{

    public static function getTableName()
    {
        return 'subcategory';
    }

    public static function getEntityClass()
    {
        //возвратит полное имя класса с пространством имён
        return Subcategory::class;
    }

}