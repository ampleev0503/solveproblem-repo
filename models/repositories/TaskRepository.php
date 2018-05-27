<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 18.05.2018
 * Time: 0:31
 */

namespace app\models\repositories;


use app\models\Repository;
use app\models\Task;

class TaskRepository extends Repository
{
    public static function getTableName()
    {
        return 'task';
    }

    public static function getEntityClass()
    {
        //возвратит полное имя класса с пространством имён
        return Task::class;
    }

    public function getTasksByIds($idsArray) {
        $tableName = static::getTableName();

        $idsArray = implode(',', $idsArray);

        $sql = "SELECT * FROM {$tableName} WHERE id IN ($idsArray)";

        //var_dump($sql);

        return static::getDb()->queryAll($sql, [], static::getEntityClass());


    }
}