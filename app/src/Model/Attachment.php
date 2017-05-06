<?php

namespace Solis\PhpView\Model;

use Solis\PhpView\Abstractions\AttachmentAbstract;
use Solis\PhpView\Contracts\ViewContract;

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