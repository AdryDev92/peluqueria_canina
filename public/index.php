<?php
require_once '../vendor/autoload.php';

use Phroute\Phroute\RouteCollector;
use Illuminate\Database\Capsule\Manager as Capsule;


// Punto de entrada a la aplicación
require_once '../helpers.php';

session_start();

$baseDir = str_replace( basename($_SERVER['SCRIPT_NAME']),'', $_SERVER['SCRIPT_NAME'] );

$baseUrl = "http://" . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);

if(file_exists(__DIR__.'/../.env')){
    $dotenv = new Dotenv\Dotenv(__DIR__.'/..');
    $dotenv->load();
}

// Instancia de Eloquent
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$route = $_GET['route'] ?? "/";

$router = new RouteCollector();

// Filtro para aplicar a rutas a USUARIOS AUTENTICADOS
// en el sistema
$router->filter('auth', function(){
    if(!isset($_SESSION['userId'])){
        header('Location: '. BASE_URL);
        return false;
    }
});

$router->group(['before' => 'auth'], function ($router){
    $router->get('/perros/new', ['\App\Controller\PerrosController', 'getNew']);
    $router->post('/perros/new', ['\App\Controller\PerrosController', 'postNew']);
    $router->get('/perros/edit/{id}', ['\App\Controller\PerrosController', 'getEdit']);
    $router->put('/perros/edit/{id}', ['\App\Controller\PerrosController', 'putEdit']);
    $router->delete('/perros/', ['\App\Controller\PerrosController', 'deleteIndex']);
    $router->get('/logout', ['\App\Controller\HomeController', 'getLogout']);
});

// Filtro para aplicar a rutas a USUARIOS NO AUTENTICADOS
// en el sistema
$router->filter('noAuth', function(){
    if( isset($_SESSION['userId'])){
        header('Location: '. BASE_URL);
        return false;
    }
});

$router->group(['before' => 'noAuth'], function ($router){
    $router->get('/login', ['\App\Controller\HomeController', 'getLogin']);
    $router->post('/login', ['\App\Controller\HomeController', 'postLogin']);
    $router->get('/registro', ['\App\Controller\HomeController', 'getRegistro']);
    $router->post('/registro', ['\App\Controller\HomeController', 'postRegistro']);
});

// Rutas sin filtros
$router->get('/',['\App\Controller\HomeController', 'getIndex']);
$router->get('/perros/{id}', ['\App\Controller\PerrosController', 'getIndex']);
$router->post('/perros/{id}', ['\App\Controller\PerrosController', 'postIndex']);
$router->post('/invite',['App\Controller\HomeController','postInvite']);
$route->get('/invite',['App\Controller\HomeController','getInvite']);
$router->get('/api', App\Controller\ApiController::class);



$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$method = $_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$response = $dispatcher->dispatch($method, $route);

// Print out the value returned from the dispatched function
echo $response;