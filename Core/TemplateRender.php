<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
namespace Core;

use Core\Contracts\TemplateRenderInterface;

class TemplateRender implements TemplateRenderInterface
{
    protected $layout;
    protected $viewDir;

    public function __construct($layout, $viewDir)
    {
        $this->layout  = $layout;
        $this->viewDir = $viewDir;
    }

    public function render($template, $params = [])
    {
        $view = $this->renderView($template, $params);

        return $this->renderView($this->layout, [
            'content' => $view,
        ]);
    }

    protected function renderView($template, $params = [])
    {
        ob_start();
        extract($params);
        echo include $this->viewDir.'/'.$template.'.php';

        $content = ob_get_contents();
        ob_clean();

        return $content;
    }
}