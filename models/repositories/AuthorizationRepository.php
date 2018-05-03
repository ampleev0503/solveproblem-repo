<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 12.12.2017
 * Time: 13:57
 */

namespace app\models\repositories;


use app\models\Repository;
use app\models\User;

class AuthorizationRepository extends Repository
{

    public function getUser($login)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE email = :login";

        return static::getDb()->queryObject($sql, [':login' => $login], static::getEntityClass());
    }

    public static function getTableName()
    {
        return 'user';
    }

    static public function getEntityClass()
    {
        return User::class;
    }
}