<?php
namespace app\services;

use app\base\App;


// класс, который будет подключать нам нужные файлы по имени класса
// самое важное тут то, что в данный момент $className
// совпадает с названием файла php, в котором лежит этот $className
class Autoloader
{
    private $fileExtension = ".php";

    public function loadClass($className)
    {
        // имя класса совпадает с именем файла, в котором он находится
        // поэтому если существует такой файл, то существует и класс.
        // "app\\" заменится на "ROOT_DIR", "\" заменится на "/"
        // "ROOT_DIR" - ссылается на директорию ВСЕГО проекта. Эта константа подключена в файле index.php
        $className = str_replace(["app\\", "\\"], [App::call()->config['root_dir'] , "/"], $className);
        $className .= $this->fileExtension;
        if(file_exists($className)){
            require $className;
        }
    }
}