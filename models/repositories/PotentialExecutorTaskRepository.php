<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 01.06.2018
 * Time: 19:01
 */

namespace app\models\repositories;

use app\models\Repository;
use app\models\PotentialExecutorTask;

class PotentialExecutorTaskRepository extends Repository
{
    public static function getTableName()
    {
        return 'potential_executor_task';
    }

    public static function getEntityClass()
    {
        //возвратит полное имя класса с пространством имён
        return PotentialExecutorTask::class;
    }

      // получение записей по id задачи
    public static function getTasksByExecutorId($taskId)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE taskId = :taskId";
        return static::getDb()->queryAll($sql, [':taskId' => $taskId], static::getEntityClass());
    }
}