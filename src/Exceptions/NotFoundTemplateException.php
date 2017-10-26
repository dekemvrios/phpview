<?php

namespace Solis\PhpView\Exceptions;

use Solis\Breaker\Abstractions\TExceptionAbstract;
use Solis\Breaker\Classes\TInfo;

/**
 * Class NotFoundTemplateException
 *
 * @package Solis\PhpView\Exceptions
 */
class NotFoundTemplateException extends TExceptionAbstract
{

    /**
     * NotFoundFileException constructor.
     */
    public function __construct()
    {
        // create new Tinfo object to store default TException information
        $error = Tinfo::build([
            'code'    => 500,
            'message' => 'Template file not found',
        ]);
        // create new Tinfo object to store debug TException information
        $debug = Tinfo::build([
            'class'  => $this->getClassName(),
            'method' => $this->getMethodName(),
            'trace'  => $this->getTrace(),
        ]);
        parent::__construct($error, $debug);
    }

    private function getClassName()
    {
        $stack = $this->getTrace();
        $class = $stack[0]['class'] ?: '';

        return $class;
    }

    private function getMethodName()
    {
        $stack  = $this->getTrace();
        $method = $stack[0]['function'] ?: '';

        return $method;
    }
}