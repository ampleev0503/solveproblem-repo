<?php

namespace app\models\repositories;


use app\models\Repository;
use app\models\User;

class UserRepository extends Repository
{

    public static function checkUserData($email, $hashPass)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE email = :email AND hashpass = :hashPass";
        $user = static::getDb()->queryOne($sql, [':email' => $email, ':hashPass' => $hashPass], static::getEntityClass());
        if ($user) {
            return $user->id;
        }
        return false;
    }

    public static function getTableName()
    {
        return 'user';
    }

    public static function getEntityClass()
    {
        //возвратит полное имя класса с пространством имён
        return User::class;
    }

}