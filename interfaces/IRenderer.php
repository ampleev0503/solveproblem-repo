<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 18.12.2017
 * Time: 13:45
 */

namespace app\interfaces;


interface IRenderer
{
    public function render($template, $params = []);

}