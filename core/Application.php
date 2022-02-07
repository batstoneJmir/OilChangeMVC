<?php

namespace app\core;
class Application 
{ 
    public Router $router;
    public Request $request;
    public Response $response;
    public static string $ROOT_DIR;
    public static Application $app;  
    public Database $db;  
    public Controller $controller; 

    public function __construct(string $root_path, array $config){
        self::$app = $this;

        self::$ROOT_DIR = $root_path;
        $this->response = new Response();
        $this->request = new Request();
        $this->router = new Router($this->request, $this->response); 
        $this->db = new Database($config['db']); 
    } 

    public function getController() { 
        
        return $this->controlller; 
    } 

    public function setController() { 
        
        $this->controller = $controller;
    }

    public function run(){
        echo $this->router->resolve();
    }
}
