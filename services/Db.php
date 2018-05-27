<?php
namespace app\services;


class Db
{
    private $conn = null;
    private $config;


    //private static $instance = null;

    /**
     * Db constructor.
     * @param array $config
     */
    public function __construct($driver, $host, $login, $password, $database, $charset)
    {
        $this->config['driver'] = $driver;
        $this->config['host'] = $host;
        $this->config['login'] = $login;
        $this->config['password'] = $password;
        $this->config['database'] = $database;
        $this->config['charset'] = $charset;
    }


    //этот метод вызовется только тогда, когда в этом есть необходимость (есть какой-то запрос к бд, соответсвенно этот метод вызовется только в этот момент)
    private function getConnection()
    {

        if (is_null($this->conn)) {
            $this->conn = new \PDO(
               $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            //устанавливаем соответсвующие аттрибуты для возврата данных из бд в виде ассоц массива
            //$this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
//            $this->conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

            //устанавливаем режим ошибок, чтобы ошибки приходили в виде exception
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
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
    public function queryOne($sql, $params = [])
    {
      $smtp = $this->query($sql, $params);
      return $smtp->fetch();
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

        //так как для нашего объекта PDO мы устанавливали аттрибуты для возврата данных в виде ассоц массива, то тут указываем fetchAll() (вернёт массив
        // со всеми строками результирующего набора в виде ассоциативных масивов)
        //return $this->query($sql, $params)->fetchAll();
        $smtp = $this->query($sql, $params);
        if($class){
            $smtp->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        }
        return $smtp->fetchAll();
    }
  public function queryObject($sql, $params, $class)
  {
    $smtp = $this->query($sql, $params);
    $smtp->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
    return $smtp->fetch();
  }


}