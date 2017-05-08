<?php

namespace Solis\PhpView\Model;

use Solis\PhpView\Abstractions\ViewAbstract;
use Solis\Breaker\TException;
use Solis\PhpView\Contracts\ViewContract;

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
     * @param array  $data
     *
     * @return ViewContract
     * @throws TException
     */
    public static function make(
        $name,
        $path,
        $data = null
    ) {
        $view = new static(
            Template::make(
                $name,
                $path
            )
        );

        if (!empty($data)) {
            $view->setData($data);
        }

        return $view;
    }


}