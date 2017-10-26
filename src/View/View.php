<?php

namespace Solis\PhpView\View;

use Solis\PhpView\Exceptions\InvalidTemplatePath;
use Solis\PhpView\Template\Template;
use Solis\Breaker\TException;
use Solis\PhpView\Template\TemplateContract;

/**
 * Class View
 *
 * @package Solis\PhpView\Model
 */
class View extends ViewAbstract
{

    /**
     * @var string
     */
    protected static $path;

    /**
     * make
     *
     * @param string $name
     * @param array  $data
     * @param string $path
     * @param string $content
     *
     * @return ViewContract
     * @throws TException
     */
    public static function make($name, $data = [], $path = '', $content = '')
    {
        $view = new static(self::buildTemplate($name, $path, $content));

        $view->setData($data);

        return $view;
    }

    /**
     * @param $name
     * @param $path
     * @param $content
     *
     * @return TemplateContract
     */
    private static function buildTemplate($name, $path, $content)
    {
        return Template::make($name, self::getLocation($path, $content), $content);
    }

    /**
     * @param $path
     * @param $content
     *
     * @return string
     */
    private static function getLocation($path, $content)
    {
        $location = !$content && !$path ? self::getPath() : $path;

        return !$content ? $location : '';
    }

    /**
     * @return string
     * @throws \Exception
     */
    public static function getPath()
    {
        if (!self::$path || !is_dir(self::$path)) {
            throw new InvalidTemplatePath();
        }

        return self::$path;
    }

    /**
     * @param $path
     *
     * @throws InvalidTemplatePath
     */
    public static function setPath($path)
    {
        if (!is_dir($path)) {
            throw new InvalidTemplatePath();
        }
        self::$path = $path;
    }
}
