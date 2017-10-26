<?php

namespace Solis\PhpView\Attachment;

use Solis\PhpView\Template\TemplateContract;
use Solis\PhpView\View\ViewContract;

/**
 * Class Attachment
 *
 * @package Solis\PhpView\Model
 */
abstract class AttachmentAbstract implements AttachmentContract
{
    /**
     * @var ViewContract[]
     */
    protected $attached = [];

    /**
     * AttachmentAbstract constructor.
     *
     * @param ViewContract[] $attached
     */
    protected function __construct($attached)
    {
        $this->setAttached($attached);
    }

    /**
     * @param ViewContract[] $attached
     */
    public function setAttached($attached)
    {
        $this->attached = $attached;
    }

    /**
     * @return ViewContract[]
     */
    public function getAttached()
    {
        return $this->attached;
    }

    /**
     * @param ViewContract $view
     */
    public function append($view)
    {
        $this->attached[] = $view;
    }

    /**
     * @param string $name
     *
     * @return ViewContract|bool
     */
    public function getEntry($name)
    {
        $item = array_filter($this->getAttached(), function (ViewContract $view) use ($name) {
            return $name == $view->getTemplate()->getName();
        });

        return $item ? $item[0] : false;
    }
}