<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 20.05.2018
 * Time: 1:51
 */

namespace app\models;


class Subcategory extends DataEntity
{

    public $id;
    public $name;
    public $categoryId;

    public function __construct($name = null,$categoryId = null, $id = null)
    {
        $this->id;
        $this->name = $name;
        $this->categoryId = $categoryId;
    }

}