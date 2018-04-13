<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 06.04.2018
 * Time: 14:02
 */

namespace app\services;
class RequestClassException extends \Exception{}

//Автозагрузчик
class Autoloader
{

    public function loadClass($classname)
    {
        //Подменяем пути , на корень проекта
        $pathToClass = str_replace(['app\\','\\'],[ROOT_DIR,'/'],$classname);
        $fileName =  $pathToClass.".php";


        if(file_exists($fileName)){
            require_once "$fileName";
        }else{
            //если файла не существует создаем исключение
            //которое отлавливается в FrontController
            throw new RequestClassException('class');
        }
    }
}