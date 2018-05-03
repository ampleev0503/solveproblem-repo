<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 02.05.2018
 * Time: 10:35
 */

namespace app\models\repositories;


use app\models\Repository;

class GenerateUrlRepository extends Repository
{

  public function insertPath($login,$path)
  {
    $tableName = static::getTableName();
    $sql = "INSERT INTO {$tableName} (login,path) VALUES (:login,:path)";
    return static::getDb()->execute($sql, [':login'=>$login, ':path'=>$path]);
  }

  public function checkPath($login)
  {
    $tableName = static::getTableName();
    $sql = "SELECT path FROM {$tableName} WHERE login = :login";
    return static::getDb()->queryOne($sql, [':login' => $login])[0];
  }

  public static function getTableName()
  {
    return 'active_account';
  }

  static public function getEntityClass()
  {
    return '#';
  }
}