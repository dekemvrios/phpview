<?php

namespace Solis\PhpView\Model;

use Solis\PhpView\Abstractions\ViewAbstract;
use Solis\Breaker\TException;

/**
 * Class View
 *
 * @package Solis\PhpView\Model
 */
class View extends ViewAbstract
{
    /**
     * make
     *
     * @param string $name
     * @param string $path
     *
     * @return \static
     * @throws TException
     */
    public static function make(
        $name,
        $path
    ) {

        return new static(
            Template::make(
                $name,
                $path
            )
        );
    }


}