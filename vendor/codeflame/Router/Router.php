<?php 
namespace vendor\codeflame\Router;

class Router {
    static $rotas = [];

    public static function get(array $url) {
        self::$rotas[] = $url;
    }

    public static function router($rota) {
        foreach(self::$rotas as $r)
        {
            if(isset($r[$rota]))
                call_user_func($r[$rota]);
        }
    }
}