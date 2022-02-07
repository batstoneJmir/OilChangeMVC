<?php 


require_once __DIR__ .'/vendor/autoload.php';
use app\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
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


$app = new Application(__DIR__,$config); 

try{ 

$app->db->applyMigrations();
}
catch(Exception $e){
    dd($e);
}
