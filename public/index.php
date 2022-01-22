<?php
require_once __DIR__ .'/../vendor/autoload.php';
use app\core\Application; 
use app\controllers\SiteController; 
use app\controllers\AuthController; 


if (!function_exists('dd')) {
    function dd() {
       foreach(func_get_args() as $x) {
           echo "<pre>";
           var_dump($x);
           echo "</pre>";
       }
       die;
    }
 } 

 
$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class ,'home']);

$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->router->get('/contact', [new SiteController(), 'contact']); 
$app->router->get('/login',[AuthController::class,'login']); 
$app->router->post('/login',[AuthController::class,'login']); 
$app->router->get('/register',[AuthController::class,'register']); 
$app->router->post('/register',[AuthController::class,'register']); 


$app->run();