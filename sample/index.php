<?php

require_once '../vendor/autoload.php';

use Solis\PhpView\Model\Attachment;
use Solis\PhpView\Model\View;
use Solis\Breaker\TException;

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
            // Também é possível atribuir diretório individualmente para instancia de View
        ], dirname(__FILE__) . "/inside/"),
    ]));

    $main->getAttachment()->getEntry('attached.html')->setDraw(true);

    echo $main->render();
} catch (TException $ex) {
    echo $ex->toJson();
}
