<?php

namespace Solis\PhpView\Contracts;

/**
 * Class AttachmentContract
 *
 * @package Solis\PhpView\Contracts
 */
interface AttachmentContract
{
    /**
     * @param ViewContract[] $attached
     */
    public function setAttached($attached);

    /**
     * @return ViewContract[]
     */
    public function getAttached();

    /**
     * @param $item
     */
    public function append($item);
}