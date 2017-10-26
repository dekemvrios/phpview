<?php

require_once '../vendor/autoload.php';

use Solis\PhpView\Attachment\Attachment;
use Solis\PhpView\View\View;
use Solis\Breaker\Abstractions\TExceptionAbstract;

try {
    // atribui o nome do diretório que contém os templates utilizados
    View::setPath(dirname(__FILE__) . "/");

    $main = View::make('main.html', [
        'title'   => 'Esse é o elemento principal (main)',
        'message' => 'Ele contém um corpo de texto',
    ]);

    $main->setAttachment(Attachment::make([
        View::make('attached.html', [
            'title'   => 'Esse é o elemento anexo (attached)',
            'message' => 'Também contém um corpo de texto',
        ], dirname(__FILE__) . "/inside/"),

        View::make('virtual.html', [
            'title'   => 'Esse é o elemento virtual (virtual)',
            'message' => 'Com conteúdo gerado dinâmicamente',
        ], "", file_get_contents(dirname(__FILE__) . '/virtual/virtual.html')),
    ]));

    $attached = $main->getAttachment()->getEntry('attached.html');
    if ($attached) {
        $attached->setDraw(true);
    }

    echo $main->render();
} catch (\Exception $ex) {
    echo $ex instanceof TExceptionAbstract ? $ex->toJson() : $ex->getMessage();
}
