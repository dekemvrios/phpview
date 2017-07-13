<?php

namespace Solis\PhpView\View;

use Solis\PhpView\Template\TemplateContract;
use Solis\PhpView\Attachment\AttachmentContract;
use Solis\Breaker\Abstractions\TExceptionAbstract;

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
     * @throws TExceptionAbstract
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

    /**
     * @param bool $draw
     */
    public function setDraw($draw);

    /**
     * @return bool
     */
    public function hasDraw();
}