<?php

require 'Router.php';
require 'Route.php';
require 'ProductsController.php';

$router = new Router($_SERVER['REQUEST_URI']);

$router->add('/', function ()
{
	return '<h1>Home</h1>';
});

$router->add('/productos', 'ProductsController::index');
$router->add('/productos/:name', 'ProductsController::show');

// /ruta/con/un/monton/de/parametros
$router->add('/:a/:b/:c/:d/:e/:f', function ($a, $b, $c, $d, $e, $f)
{
	return "$a<br>$b<br>$c<br>$d<br>$e<br>$f";
});

//print_r($router);
$router->run();
