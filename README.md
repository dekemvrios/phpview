# README

## O que é o PhpView

PhpView é um simples mecanismo de gerenciamento de templates html em PHP.

## Como instalar?

Esse pacote foi estruturado para ser instalado por meio do composer.

```
composer require solis/phpview
``` 

## Como utilizar?

Declare o uso da classe View e utilize seu método estático make
 
```
use Solis\PhpView\View\View

$view = View::make($name, $data, $path);
```

A chamada ao método estático retorna uma instância de ViewContract que é responsável por renderizar o html como string

```
$view->render();
```

## Como Funciona

O objeto View é instanciado utilizando o método estático make, qual recebe 3 argumentos:

* $name - nome real do arquivo qual contém o conteúdo html.
* $data - array associativo contendo os dados a serem renderizados na string html.
* $path - caminho para o diretório que contém o respectivo arquivo html.

Uma instancia valida do objeto é demonstrada a seguir

```
$main = View::make('main.html', [
    'title' => 'content to place in a {title} entry in main.html',
    'message' => 'content to place in a {message} entry in main.html'
],  dirname(__FILE__) . "/");
```

O ViewContract utiliza o conceito de anexos para representar outras Views html vinculadas a si. Um anexo (Attachment) contém um 
array de implementações de ViewContract.
 
 ```
 $main->setAttachment(Attachment::make([
     View::make('attached.html', [
         'title' => 'content to place in a {title} entry in attached.html',
         'message' => 'content to place in a {message} entry in attached.html'
     ], dirname(__FILE__) . "/")
 ]));
 ```
 
Uma ViewContract utilizada como anexo é renderizada por padrão, porém é possível ocultá-la caso necessário

```
$main->getAttachment()->getEntry('attached.html')->setDraw(false);
```
