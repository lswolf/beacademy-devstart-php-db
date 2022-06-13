<?php 
include dirname(__DIR__).'/vendor/autoload.php';
use  App\Controller\IndexController;
use  App\Controller\ProductController;
use  App\Controller\CategoryController;
use  App\Controller\ErrorController;
$i = new IndexController();
$p = new ProductController();
$c = new CategoryController();

$url = explode('?', $_SERVER['REQUEST_URI'])[0];
/* echo $url;
switch ($url) {
case  '/':
    $i->indexAction();
    break;
case  '/login':
    $i->loginAction();
    break;
case  '/product':
    $p->listAction();
    break;
case  '/product/add':
    $p->addAction();
    break;
case  '/product/edit':
    $p->editAction();
    break;
case  '/category':
    $c->listAction();
    break;
case  '/category/add':
    $c->addAction();
    break;
case  '/category/edit':
    $c->editAction();
    break;
default:
  (new ErrorController)->notFoundAction();
} */
function createRoute(string $controller, string $method){
    return [
        'controller' => $controller,
        'method' => $method
    ];
}
$routes = [
    '/' => createRoute(IndexController::class,'indexAction'),
    '/login' => createRoute(IndexController::class,'loginAction'),
    '/product'=> createRoute(ProductController::class,'listAction'),
    '/product/add'=> createRoute(ProductController::class,'addAction'),
    '/product/edit'=> createRoute(ProductController::class,'editAction'),
    '/category' => createRoute(CategoryController::class,'listAction'),
    '/category/add'=> createRoute(CategoryController::class,'addAction'),
    '/category/edit'=> createRoute(CategoryController::class,'editAction'),
];
if(!isset($routes[$url])){
    (new ErrorController)->notFoundAction();
    exit;
}
$controller= $routes[$url]['controller'];
$method = $routes[$url]['method'];
(new $controller)-> $method();

