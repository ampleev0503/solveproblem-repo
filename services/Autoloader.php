<?php
namespace app\services;

use app\base\App;

class RequestClassException extends \Exception{}

class Autoloader
{
    private $fileExtension = ".php";

    public function loadClass($className)
    {
        $className = str_replace(["app\\", "\\"], [App::call()->config['root_dir'] , "/"], $className);
        $className .= $this->fileExtension;

        if(file_exists($className)){
            require $className;
//        }else{
//          //если файла не существует создаем исключение
//          //которое отлавливается в FrontController
//          throw new RequestClassException('class');
        }
    }
}