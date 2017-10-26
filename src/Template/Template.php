<?php

namespace Solis\PhpView\Template;

use Solis\Breaker\TException;

/**
 * Class Template
 *
 * @package Solis\PhpView\Model
 */
class Template extends TemplateAbstract
{
    /**
     * @param string $name
     * @param string $path
     * @param string $content
     *
     * @return static
     * @throws TException
     */
    public static function make($name, $path, $content = '')
    {
        $template = new static($name, $path);

        $template->setContent($content);

        return $template;
    }
}