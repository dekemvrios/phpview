<?php

namespace Solis\PhpView\Attachment;

use Solis\PhpView\View\ViewContract;

/**
 * Class Attachment
 *
 * @package Solis\PhpView\Model
 */
class Attachment extends AttachmentAbstract
{

    /**
     * @param ViewContract[] $attached
     *
     * @return static
     */
    public static function make($attached)
    {
        return new static($attached);
    }
}