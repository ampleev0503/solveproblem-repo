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


    // ЗАКАЗЧИК

      // получение задач, на которые откликнулся исполнитель
    public function getTasksByPotentialExecutor($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT t.id, t.name, t.endDate, t.cost, u.firstName, u.lastName  FROM {$tableName} as t
        inner join potential_executor_task as pet on t.id = pet.taskId
        inner join `user` as u on t.customerId = u.id
        WHERE pet.executorId = :id";
        return static::getDb()->queryAll($sql, [':id' => $id], static::getEntityClass());
    }

    // получение задач, которые исполняются
    public function getTasksByInProgressExecutor($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT t.id, t.name, t.endDate, t.cost, u.firstName, u.lastName  FROM {$tableName} as t
        inner join `user` as u on t.customerId = u.id
        WHERE t.executorId = :id AND t.statusId = 2";
        return static::getDb()->queryAll($sql, [':id' => $id], static::getEntityClass());
    }

    // получение задач, которые выполнены
    public function getTasksMaded($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT t.id, t.name, t.endDate, t.cost, u.firstName, u.lastName  FROM {$tableName} as t
        inner join `user` as u on t.customerId = u.id
        WHERE t.executorId = :id AND t.statusId = 3";
        return static::getDb()->queryAll($sql, [':id' => $id], static::getEntityClass());
    }


    // ИСПОЛНИТЕЛЬ



    public function getTasksByCustomer($id) {
        $tableName = static::getTableName();
        $sql = "SELECT t.id, t.name, t.startDate, t.endDate, t.cost, t.description  FROM {$tableName} as t
        WHERE t.customerId = :id";
        return static::getDb()->queryAll($sql, [':id' => $id], static::getEntityClass());
    }

    // получение задач, на которые откликнулся исполнитель
    public function getOffersByPotentialExecutor($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT t.id, t.name, t.description, t.cost, t.executorId as texeId, pet.executorId as petexeId, t.statusId, u.firstName, u.lastName, u.telephone FROM {$tableName} as t
        inner join potential_executor_task as pet on t.id = pet.taskId
        inner join `user` as u on pet.executorId = u.id
        WHERE t.customerId = :id";
        return static::getDb()->queryAll($sql, [':id' => $id], static::getEntityClass());
    }

    // получение задач "В процессе"
    public function getTasksInProcess($id) {
        $tableName = static::getTableName();
        $sql = "SELECT t.id, t.name, t.description, t.cost, t.executorId, t.statusId, u.firstName, u.lastName, u.telephone FROM {$tableName} as t
        inner join `user` as u on t.executorId = u.id
        WHERE t.customerId = :id AND t.statusId = 2";
        return static::getDb()->queryAll($sql, [':id' => $id], static::getEntityClass());
    }

    // получение задач в "Завершенные"
    public function getTasksByCustomerMaded($id) {
        $tableName = static::getTableName();
        $sql = "SELECT t.id, t.name, t.description, t.startDate, t.endDate, t.cost, t.executorId, t.statusId, u.firstName, u.lastName, u.telephone FROM {$tableName} as t
        inner join `user` as u on t.executorId = u.id
        WHERE t.customerId = :id AND t.statusId = 3";
        return static::getDb()->queryAll($sql, [':id' => $id], static::getEntityClass());
    }









}