<?php

require 'Router.php';
require 'Route.php';
require 'ProductsController.php';


$router = new Router($_SERVER['REQUEST_URI']);
Router::$dir_root="/rutas-amigables-con-php"; /////direccion  base de la carpeta base.
$router->add('/', function ()
{
	return '<h1>Inicio</h1>';
});

$router->add('/productos', 'ProductsController::index');
$router->add('/productos/:name', 'ProductsController::show');

// /ruta/con/un/monton/de/parametros
$router->add('/:a/:b/:c/:d/:e/:f', function ($a, $b, $c, $d, $e, $f)
{
	return "$a<br>$b<br>$c<br>$d<br>$e<br>$f";
});


$router->run();
