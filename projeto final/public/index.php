<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<?php 
include dirname(__DIR__).'/vendor/autoload.php';
use  App\Controller\ErrorController;
include '../src/View/menu.php';
$routes = include '../config/routes.php';
if(!isset($routes[$url])){
    (new ErrorController)->notFoundAction();
    exit;
}
$controller= $routes[$url]['controller'];
$method = $routes[$url]['method'];
(new $controller)-> $method();


// $connection = Connection::getConnection();
// $query = 'SELECT * FROM tb_category';
// $preparação = $connection->prepare($query);
// $preparação->execute();
// var_dump($preparação);
// while ( $registro = $preparação->fetch()){
//     var_dump($registro);
// }
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


