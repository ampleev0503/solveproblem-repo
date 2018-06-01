<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 01.06.2018
 * Time: 18:00
 */

namespace app\models;


class PotentialExecutorTask extends DataEntity
{
    public $executorId;
    public $taskId;
    public $message;

    public function __construct($executorId = null, $taskId = null, $message = null)
    {
        $this->executorId = $executorId;
        $this->taskId = $taskId;
        $this->message = $message;
    }

}