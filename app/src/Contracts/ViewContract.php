<?php

namespace Solis\PhpView\Contracts;

use Solis\Breaker\TException;

/**
 * Class ViewContract
 *
 * @package Solis\PhpView\Contracts
 */
interface ViewContract
{
    /**
     * render
     *
     * @return string
     * @throws TException
     */
    public function render();

    /**
     * @return TemplateContract
     */
    public function getTemplate();

    /**
     * @param TemplateContract $template
     */
    public function setTemplate($template);

    /**
     * @return array
     */
    public function getData();

    /**
     * @param array $data
     */
    public function setData($data);

    /**
     * @return AttachmentContract
     */
    public function getAttachment();

    /**
     * @param AttachmentContract $attachment
     */
    public function setAttachment($attachment);
}