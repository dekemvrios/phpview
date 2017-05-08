<?php

namespace Solis\PhpView\Abstractions;

use Solis\PhpView\Contracts\ViewContract;
use Solis\PhpView\Contracts\TemplateContract;
use Solis\PhpView\Contracts\AttachmentContract;
use Solis\Breaker\TException;

/**
 * Class ViewAbstract
 *
 * @package Solis\PhpView\Abstractions
 */
abstract class ViewAbstract implements ViewContract
{
    /**
     * @var bool
     */
    protected $draw;

    /**
     * @var TemplateContract
     */
    protected $template;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var AttachmentContract
     */
    protected $attachment;

    /**
     * __construct
     *
     * @param TemplateContract $template
     */
    protected function __construct(
        $template
    ) {
        $this->setTemplate($template);
        $this->setDraw(true);
    }

    /**
     * render
     *
     * @return string
     * @throws TException
     */
    public function render()
    {
        // retorna o conteudo do template como string
        $html = $this->getTemplate()->render();

        // substitui as palavras reservadas caso existirem dados atribuidos
        if (!empty($this->getData())) {
            foreach ($this->getData() as $param => $value) {
                $html = str_replace(
                    "{{$param}}",
                    $value,
                    $html
                );
            }
        }

        // valida se ha informacoes adicionais a serem adicionadas
        if (!empty($this->getAttachment())) {
            foreach ($this->getAttachment()->getAttached() as $view) {
                $html = str_replace(
                    "{{$view->getTemplate()->getName()}}",
                    $view->hasDraw() ? $view->render() : '',
                    $html
                );
            }
        }

        return $html;
    }

    /**
     * @param bool $draw
     */
    public function setDraw($draw)
    {
        $this->draw = $draw;
    }

    /**
     * @return bool
     */
    public function hasDraw()
    {
        return $this->draw;
    }

    /**
     * @return TemplateContract
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param TemplateContract $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return AttachmentContract
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @param AttachmentContract $attachment
     */
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
    }

}