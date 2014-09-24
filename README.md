Rutas amigables con php
=======================

Ejemplo de cómo se pueden crear rutas amigables con PHP


## Uso

Se debe crear un objeto de tipo `Router` que recibe el `$_SERVER['REQUEST_URI']`

    require 'Router.php';
    require 'Route.php';
    $router = new Router($_SERVER['REQUEST_URI']);


Para crear rutas, se usa el método `add`:

    $router->add('/', function ()
    {
        return 'Home';
    });

El método `add` recibe la ruta como primer parámetro y un closure como segundo.
Se pueden enviar rutas con parámetros. El closure recibirá esos parámetros en el mismo orden:

    $router->add('/productos/:id', function ($id)
    {
        return 'Viendo el producto ' . $id;
    });

En lugar de una función anónima se puede enviar el nombre de una función:

    function index ()
    {
        return 'Home';
    }

    $router->add('/', 'index');

o el método de una clase:

    class ProductosController {
        public function index ()
        {
            return 'Lista de productos';
        }
        public function show ($id)
        {
            return 'Viendo el producto ' . $id;
        }
    }

    $router->add('/', 'ProductosController::index');
    $router->add('/', 'ProductosController::show');
