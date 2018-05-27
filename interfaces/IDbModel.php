<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 14.04.2018
 * Time: 16:11
 */

namespace app\interfaces;


interface IDbModel
{
    public static function getOne($id);

    public static function getAll();

    public static function getTableName();

}