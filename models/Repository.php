<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 14.04.2018
 * Time: 17:09
 */

namespace app\models;

use app\services\Db;


abstract class Repository
{
    public function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return static::getDb()->queryOne($sql, [':id' => $id], static::getEntityClass());
    }

    public function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return static::getDb()->queryAll($sql, [], static::getEntityClass());
    }

    public function getLimit($limit)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT :limit";
        //var_dump($sql);
        return static::getDb()->queryAll($sql, [':limit' => $limit], static::getEntityClass());
    }

    public function delete(DataEntity $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return static::getDb()->execute($sql, [':id' => $entity->id]);
    }



    public function insert(DataEntity $entity)
    {
        $params = [];
        $columns = [];

        //foreach может не пройти, если свойства у entity будут приватными
        //тогда можно использовать ф-ию get_object_vars
        foreach ($entity as $key => $value){
            $params[":$key"] = $value;
            $columns[] = $key;
        }

        //var_dump($params);

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $tableName = $this->getTableName();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";

        //var_dump($sql);
        //var_dump($params);

        return static::getDb()->execute($sql, $params);
    }

    public function update(DataEntity $entity)
    {
        $params = [];
        $expression = [];

        foreach ($entity as $key => $value){
            if ($key == 'db') {
                continue;
            }
            $params[":$key"] = $value;
            if ($key !== 'id') {
                $expression[] = "$key = :$key";
            }
        }

        $expression = implode(", ", $expression);

        $tableName = static::getTableName();

        $sql = "UPDATE {$tableName} SET {$expression} WHERE id = :id";

//        var_dump($sql);
//        var_dump($params);

        return static::getDb()->execute($sql, $params);
    }


    /**
     * @return Db
     */
    public static function getDb() {
        return Db::getInstance();
    }


    abstract public static function getTableName();
    abstract public static function getEntityClass();
}