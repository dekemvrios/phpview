<?php

namespace Solis\PhpView\Contracts;

use Solis\Breaker\TException;

/**
 * Interface TemplateContract
 *
 * @package Solis\PhpView\Contracts
 */
interface TemplateContract
{

    /**
     * exist
     *
     * @throws TException
     */
    public function exist();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getPath();

    /**
     * @param string $path
     */
    public function setPath($path);

    /**
     * @return string
     */
    public function render();
}