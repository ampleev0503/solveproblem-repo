<?php
/**
 * Created by PhpStorm.
 * User: Вадим
 * Date: 18.12.2017
 * Time: 12:57
 */

namespace app\services\renderers;

use app\base\App;

use app\interfaces\IRenderer;

class TemplateRenderer implements IRenderer
{
    public function render($template, $params = []) {
        ob_start();
        extract($params);
        $templatePath = App::call()->config['templates_dir'] . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}