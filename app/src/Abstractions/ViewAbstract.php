<?php

namespace Solis\PhpView\Abstractions;

use Solis\PhpView\Contracts\ViewContract;
use Solis\PhpView\Contracts\TemplateContract;
use Solis\Breaker\TException;

/**
 * Class ViewAbstract
 *
 * @package Solis\PhpView\Abstractions
 */
abstract class ViewAbstract implements ViewContract
{
    /**
     * @var TemplateContract
     */
    protected $template;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var ViewContract[]
     */
    protected $attached;

    /**
     * __construct
     *
     * @param TemplateContract $template
     */
    protected function __construct(
        $template
    ) {
        $this->setTemplate($template);
    }

    /**
     * inc
     *
     * @throws TException
     */
    public function incorporate()
    {
        // extrai os dados como variaveis caso existirem
        if (!empty($this->getData())) {
            extract($this->getData());
        }

        // inclui o template de acordo com o seu diretório
        include_once $this->getTemplate()->getPath();
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

        return $html;
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
     * @return ViewContract[]
     */
    public function getAttached()
    {
        return $this->attached;
    }

    /**
     * @param ViewContract[] $attached
     */
    public function setAttached($attached)
    {
        $this->attached = $attached;
    }

}