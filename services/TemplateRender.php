<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 06.04.2018
 * Time: 23:25
 */

namespace app\services;

//рендер шаблона
class TemplateRender
{

    public function render($template, $params)
    {
        ob_start();
        extract($params);
        $templatePath = TEMPLATES_DIR.$template.".php";
        include $templatePath;
        return  ob_get_clean();
    }
}