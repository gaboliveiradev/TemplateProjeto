<?php 
namespace vendor\codeflame\Router;

class Router {
    static $rotas = [];
    static $default_rota = [];
    static $namespace = "App\\Controller\\";

    public static function get(array $uri)
    {   
        self::$rotas[] = $uri;
    }

    public static function run($parse_uri) 
    {
        foreach(self::$rotas as $r) 
        {
            switch($parse_uri) 
            {
                case $r['uri']:
                    call_user_func(self::$namespace . $r['metodo']);
                break;
                default:
                    http_response_code(404);
                    //call_user_func(self::$namespace . self::$default_rota[0]['metodo']);
                break;
            }
        }
    }

    public static function set_default_route(array $uri) 
    {
        self::$default_rota[0] = $uri;
    }

    public static function change_namespace(string $namespace = "App\\Controller\\") 
    {
        self::$namespace = $namespace;
    }

    public static function call_route() 
    {
        $parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        self::run($parse_uri);
    }
}