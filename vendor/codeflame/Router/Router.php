<?php 
namespace vendor\codeflame\Router;

class Router {
    static $rotas = [];
    static $namespace = "App\\Controller\\";

    public static function get(array $uri) 
    {   
        self::$rotas[] = $uri;
    }

    public static function run($parse_uri) 
    {
        for($i = 0; $i < count(self::$rotas); $i++) {
            switch($parse_uri) {
                case self::$rotas[$i]["uri"]:
                    call_user_func(self::$namespace . self::$rotas[$i]["metodo"]);
                break;
                default:
                    http_response_code(404);
                break;
            }
        }
    }

    public static function change_namespace(string $namespace) 
    {
        self::$namespace = $namespace;
    }

    public static function call_route() 
    {
        $parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        self::run($parse_uri);
    }
}