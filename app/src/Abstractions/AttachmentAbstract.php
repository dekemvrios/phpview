<?php

namespace Solis\PhpView\Abstractions;

use Solis\PhpView\Contracts\ViewContract;
use Solis\PhpView\Contracts\AttachmentContract;

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
    protected $attached;

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
}