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

  public function insertActiveAccount($login,$path)
  {
    $tableName = static::getTableName();
    $sql = "INSERT INTO {$tableName} (login,path) VALUES (:login,:path)";
    return static::getDb()->execute($sql, [':login'=>$login, ':path'=>$path]);
  }

  public function checkActivePath($login)
  {
    $tableName = static::getTableName();
    $sql = "SELECT path FROM {$tableName} WHERE login = :login";
    return static::getDb()->queryOne($sql, [':login' => $login])[0];
  }

  public function insertForgetPass($login,$path)
  {
    $tableName = static::getTableForgetPas();
    $sql = "INSERT INTO {$tableName} (login,path) VALUES (:login,:path)";
    return static::getDb()->execute($sql, [':login'=>$login, ':path'=>$path]);
  }

  public function checkForgetPath($path)
  {
    $tableName = static::getTableForgetPas();
    $sql = "SELECT login FROM {$tableName} WHERE path = :path";
    return static::getDb()->queryOne($sql, [':path' => $path])[0];
  }

  public static function getTableName()
  {
    return 'active_account';
  }

  public static function getTableForgetPas()
  {
    return 'forget_password';
  }
  static public function getEntityClass()
  {
    return '#';
  }
}