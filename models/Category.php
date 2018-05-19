<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 20.05.2018
 * Time: 1:39
 */

namespace app\models;


class Category extends DataEntity
{

    public $id;
    public $name;

    public function __construct($name = null, $id = null)
    {
        $this->id;
        $this->name = $name;
    }

}