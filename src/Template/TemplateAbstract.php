<?php

namespace Solis\PhpView\Template;

use Solis\Breaker\TException;
use Solis\PhpView\Exceptions\NotFoundTemplateException;

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
     * @var string
     */
    protected $content;

    /**
     * Template constructor.
     *
     * @param $name
     * @param $path
     *
     * @throws TException;
     */
    protected function __construct($name, $path = '')
    {
        $this->setName($name);
        if ($path) {
            $this->setPath($path . $name);
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
     *
     * @throws NotFoundTemplateException
     */
    public function setPath($path)
    {
        if (!file_exists($path)) {
            throw new NotFoundTemplateException();
        }
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return bool|string
     */
    public function render()
    {
        return $this->content ? $this->content : file_get_contents($this->getPath());
    }
}
