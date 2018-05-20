<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 17.05.2018
 * Time: 23:04
 */

namespace app\models;


class Task extends DataEntity
{
    public $id;
    public $name;
    public $description;
    public $startDate;
    public $endDate;
    public $cost;
    public $statusId;
    public $customerId;
    public $executorId;
    public $subcategoryId;
    public $cityId;
    public $created;

    public function __construct($name = null, $description = null, $startDate = null, $endDate = null, $cost = null, $customerId = null, $executorId = null, $subcategoryId = null, $cityId = null, $created = null, $id = null, $statusId = 1)
    {
        $this->id;
        $this->name = $name;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->cost = $cost;
        $this->customerId = $customerId;
        $this->executorId = $executorId;
        $this->subcategoryId = $subcategoryId;
        $this->cityId = $cityId;
        $this->created = $created;
        $this->statusId = $statusId;
    }


}