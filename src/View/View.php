<?php

namespace Solis\PhpView\View;

use Solis\PhpView\Template\Template;
use Solis\Breaker\TException;

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
     *
     * @return ViewContract
     * @throws TException
     */
    public static function make(
        $name,
        $data = null,
        $path = null
    ) {
        $view = new static(
            Template::make(
                $name,
                empty($path) ? self::getPath() : $path
            )
        );

        if (!empty($data)) {
            $view->setData($data);
        }

        return $view;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public static function getPath()
    {
        if (empty(self::$path)) {
            throw new TException(
                __CLASS__,
                __METHOD__,
                'path for templates has not been defined',
                400
            );
        }

        return self::$path;
    }

    /**
     * @param string $path
     */
    public static function setPath($path)
    {
        self::$path = $path;
    }
}
