<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 17.06.2018
 * Time: 22:49
 */

namespace app\models\repositories;


use app\models\Feedback;
use app\models\Repository;

class FeedbackRepository extends Repository
{

    public static function getTableName()
    {
        return 'feedback';
    }

    public static function getEntityClass()
    {
        //возвратит полное имя класса с пространством имён
        return Feedback::class;
    }

    // получение отзывов о заказчике
    public function getFeedbacks($id) {
        $tableName = static::getTableName();
        $sql = "SELECT f.id, f.point, f.comment, f.taskId,
                       t.name, u.firstName, u.lastName, u.id as userId
                FROM {$tableName} as f
                inner join `task` as t on f.taskId = t.id
                inner join `user` as u on t.customerId = u.id
                WHERE t.executorId = :id AND t.statusId = 3";
        return static::getDb()->queryAll($sql, [':id' => $id], static::getEntityClass());
    }

}