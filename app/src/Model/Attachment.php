<?php

namespace Solis\PhpView\Model;

use Solis\PhpView\Contracts\ViewContract;
use Solis\PhpView\Contracts\AttachmentContract;

/**
 * Class Attachment
 *
 * @package Solis\PhpView\Model
 */
class Attachment implements AttachmentContract
{
    /**
     * @var ViewContract[]
     */
    private $attached;

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
     * @param $item
     */
    public function append($item)
    {
        $this->attached[] = $item;
    }
}