<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
namespace Core\Contracts;

interface TemplateRenderInterface {
    function render($template, $params = []);
}