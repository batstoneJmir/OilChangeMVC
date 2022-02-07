<?php
require_once __DIR__ .'/../vendor/autoload.php';
use app\core\Application; 
use app\controllers\SiteController; 
use app\controllers\AuthController; 

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load(); 


$config = [ 
    'db' =>[
        'dsn'=> $_ENV['DB_DSN'],
        'username'=> $_ENV['DB_USER'],
        'password'=> $_ENV['DB_PASSWORD'],
    ] 
];
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


$app = new Application(dirname(__DIR__),$config);


$app->router->get('/', [SiteController::class ,'home']);

$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->router->get('/contact', [new SiteController(), 'contact']); 
$app->router->get('/login',[AuthController::class,'login']); 
$app->router->post('/login',[AuthController::class,'login']); 
$app->router->get('/register',[AuthController::class,'register']); 
$app->router->post('/register',[AuthController::class,'register']); 


$app->run();