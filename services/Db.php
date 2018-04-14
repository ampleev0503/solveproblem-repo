<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 14.04.2018
 * Time: 16:37
 */

namespace app\services;

use app\traits\TSingleton;


class Db
{
    use TSingleton;

    private $conn = null;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'gu_team',
        'password' => 'gu_team',
        'database' => 'dbslvprblm',
        'charset' => 'utf8'
    ];

    //этот метод вызовется только тогда, когда в этом есть необходимость (есть какой-то запрос к бд, соответсвенно этот метод вызовется только в этот момент)
    private function getConnection()
    {
        // проверка на то, установлено ли уже соединение с бд? Если не установлено, то устанавливаем. Если установлено, то возвращаем наше соединение
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );

            $this->conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        }
        return $this->conn;
    }

    //здесь возвращаем dsn строчку для подключения к нашей бд (первый параметр при создании объекта PDO)
    private function prepareDsnString()
    {
        // %s - плэйсхолдеры, вместо которых подставится соответсвующее значение с соответсвующим типом. В нашем случае это строка.
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );

    }


    private function query($sql, $params = []){
        //Создаем ОБЪЕКТ, который подготавливает наш запрос к выполнению. prepare - это внутренний метод PDO ($this->getConnection() вернет объект класса PDO)
        $PdoStatement = $this->getConnection()->prepare($sql);
//		echo "params в методе query:<br>";
//		var_dump($params);
//		echo "sql в методе query:<br>";
//		var_dump($sql);
        //после execute еще не будет результата, но уже будет ОБЪЕКТ, который будет содержать данные о запросе
        $PdoStatement->execute($params);
        return $PdoStatement;
    }

    public function execute($sql, $params = []){
        $this->query($sql, $params);
        return true;
    }

    //метод, возвращающий одну строчку из таблицы
    public function queryOne($sql, $params = [], $class = null)
    {
        return $this->queryAll($sql, $params, $class)[0];
    }

    //метод, возвращающий набор строк из таблицы
    public function queryAll($sql, $params = [], $class = null)
    {
        /*echo"params:";
        var_dump($params);
        echo "<br>";
        var_dump($sql);
        echo "<br>";
        var_dump($class);
        echo "<br>";*/

        $smtp = $this->query($sql, $params);
        if($class){
            $smtp->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        }
        return $smtp->fetchAll();
    }

}