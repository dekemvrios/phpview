# README

## What is PhpView

PhpView is a simple template engine for php.

## Requirements

* solis/breaker : dev-master

## How To Install?

This package was designed to be installed with composer dependency management tool.

```
composer require solis/phpview
``` 

## How To Use it?

Require it with composer and instantiate a View class as following
 
```
use Solis\PhpView\Model\View

$view = View::make($name, $path, $data);
```

The make static method returns a instance of ViewContract that's able to render the html string.

```
$view->render();
```

## How This Works

The view object is built using the make method, that receives 3 arguments: 

* $name - name of the file that contains the html content
* $data - key value array containing the data to render in the html file
* $path - realpath to the folder that contains the html file

A valid view object instantiation is like the following

```
$main = View::make('main.html', [
    'title' => 'content to place in a {title} entry in main.html',
    'message' => 'content to place in a {message} entry in main.html'
],  dirname(__FILE__) . "/");
```

The ViewContract uses the concept of attachments to represent others html views linked to itself. A attachment contains
a array of ViewContract implementations.
 
 ```
 $main->setAttachment(Attachment::make([
     View::make('attached.html', [
         'title' => 'content to place in a {title} entry in attached.html',
         'message' => 'content to place in a {message} entry in attached.html'
     ], dirname(__FILE__) . "/")
 ]));
 ```
  
A attached ViewContract is rendered by default, but is possible to hide it if needed

```
$main->getAttachment()->getEntry('attached.html')->setDraw(false);
```