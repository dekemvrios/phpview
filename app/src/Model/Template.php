<?php

namespace Solis\PhpView\Model;

use Solis\Breaker\TException;
use Solis\PhpView\Abstractions\TemplateAbstract;

/**
 * Class Template
 *
 * @package Solis\PhpView\Model
 */
class Template extends TemplateAbstract
{
    /**
     * @param $name
     * @param $path
     *
     * @return static
     * @throws TException
     */
    public static function make(
        $name,
        $path
    ) {
        return new static(
            $name,
            $path
        );
    }
}