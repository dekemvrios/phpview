<?php

require_once '../vendor/autoload.php';

use Solis\PhpView\Model\Attachment;
use Solis\PhpView\Model\View;
use Solis\Breaker\TException;

try {
    $main = View::make(
        'main.html',
        dirname(__FILE__) . "/",
        [
            'title' => 'Esse é o elemento principal (main)',
            'message' => 'Ele contém um corpo de texto'
        ]
    );

    $main->setAttachment(
        Attachment::make(
            [
                View::make(
                    'attached.html',
                    dirname(__FILE__) . "/",
                    [
                        'title' => 'Esse é o elemento anexo (attached)',
                        'message' => 'Também contém um corpo de texto'
                    ]
                )
            ]
        )
    );

    $main->getAttachment()->getEntry('attached.html')->setDraw(false);

    echo $main->render();
} catch (TException $ex) {
    echo $ex->toJson();
}
