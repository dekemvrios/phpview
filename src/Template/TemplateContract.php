<?php

namespace Solis\PhpView\Template;

/**
 * Interface TemplateContract
 *
 * @package Solis\PhpView\Contracts
 */
interface TemplateContract
{

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
    public function getContent();

    /**
     * @param string $content
     */
    public function setContent($content);

    /**
     * @return string
     */
    public function render();

}