<?php
namespace app\core;

class Response
{
    public static int $HTTP_OK = 200;
    public static int $HTTP_NOT_FOUND = 404;
    public static int $HTTP_INTERNAL_ERROR = 500;
    public function setCode($code){
        http_response_code($code);
    }

}
