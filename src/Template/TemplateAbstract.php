<?php

namespace Solis\PhpView\Template;

use Solis\Breaker\TException;

/**
 * Class Template
 *
 * @package Solis\PhpView\Model
 */
abstract class TemplateAbstract implements TemplateContract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $path;

    /**
     * Template constructor.
     *
     * @param $name
     * @param $path
     *
     * @throws TException;
     */
    protected function __construct(
        $name,
        $path
    ) {
        $this->setName($name);
        $this->setPath($path . $name);

        $this->exist();
    }

    /**
     * exist
     *
     * @throws TException
     */
    public function exist()
    {
        if (!file_exists($this->getPath())) {
            throw new TException(
                __CLASS__,
                __METHOD__,
                "arquivo [ " . $this->getPath() . " ] relacionado ao template nao encontrado",
                500
            );
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     *
     * @throws TException
     */
    public function render()
    {
        $this->exist();

        return file_get_contents($this->getPath());
    }

}