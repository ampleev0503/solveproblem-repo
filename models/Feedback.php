<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 17.06.2018
 * Time: 22:50
 */

namespace app\models;


class Feedback extends DataEntity
{

    public $id;
    public $point;
    public $comment;
    public $taskId;

    public function __construct($point = null, $comment = null, $taskId = null, $id = null)
    {
        $this->id;
        $this->point = $point;
        $this->comment = $comment;
        $this->taskId = $taskId;
    }

}