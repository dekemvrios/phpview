<?php

namespace Solis\PhpView\Template;

use Solis\Breaker\Abstractions\TExceptionAbstract;

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
     * @throws TExceptionAbstract
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