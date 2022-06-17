<?php

use  App\Controller\IndexController;
use  App\Controller\ProductController;
use  App\Controller\CategoryController;

$url = explode('?', $_SERVER['REQUEST_URI'])[0];
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
    '/product/delete'=> createRoute(ProductController::class,'deleteAction'),
    '/product/edit'=> createRoute(ProductController::class,'editAction'),
    '/product/report'=> createRoute(ProductController::class,'reportAction'),
    '/category' => createRoute(CategoryController::class,'listAction'),
    '/category/add'=> createRoute(CategoryController::class,'addAction'),
    '/category/edit'=> createRoute(CategoryController::class,'editAction'),
    '/category/delete'=> createRoute(CategoryController::class,'deleteAction'),
    '/client' => createRoute(ClientController::class,'listAction'),
    '/client/add'=> createRoute(ClientController::class,'addAction'),
    '/client/edit'=> createRoute(ClientController::class,'editAction'),
    '/client/delete'=> createRoute(ClientController::class,'deleteAction'),
];


return $routes;
