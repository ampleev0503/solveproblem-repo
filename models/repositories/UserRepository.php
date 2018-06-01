<?php

namespace app\models\repositories;


use app\models\Repository;
use app\models\User;

class UserRepository extends Repository
{

  // Создаем юзера с ролью
  public function getUser($login)
  {
    $tableName = static::getTableName();
    $sql = "SELECT role.oid_role as role, user.id, user.firstName, user.lastName,user.email,user.telephone,user.rating,user.password,
user.cityId,user.isregist FROM {$tableName}
inner join user_role as role on role.oid_user = user.id
 WHERE email = :login";

    return static::getDb()->queryObject($sql, [':login' => $login], static::getEntityClass());
  }

    public function getUsersByIds($idsArray) {
        $tableName = static::getTableName();

        $idsArray = implode(',', $idsArray);

        $sql = "SELECT * FROM {$tableName} WHERE id IN ($idsArray)";

        return static::getDb()->queryAll($sql, [], static::getEntityClass());
    }

  public function addRole($id_user)
  {
    $tableName = static::getTableRole();
    $sql = "INSERT INTO {$tableName} (oid_user) VALUES (:id_user)";
    return static::getDb()->execute($sql, [':id_user' => $id_user]);
  }

  public static function getTableRole()
  {
    return 'user_role';
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