# README

## What is PhpView
PhpView is a simple template engime for php.

## Requirements
* solis/breaker : dev-master

## How To Install?
This package was designed to be installed with composer dependency management tool.
```
composer require solis/phpview "dev-master"
``` 

## How To Use it?
Require it with composer and instantiate a View class as following 
```
use Solis\PhpView\Model\View

$view = View::make($name, $path, $data);
```

The make static method returns a instance of View class that's able to render the html string.

```
$view->ouput();
```

## How This Works
The view object is built using the make method, that receives 3 arguments: 

* $name - name of the file that contains the html content
* $path - realpath to the folder that contains the html file
* $data - key value array containing the data to render in the html file
