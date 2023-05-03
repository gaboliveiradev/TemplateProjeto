<?php 
namespace vendor\codeflame\Router;

class Router {
    static $rotas = [
        "/welcome" => "WelcomeController::index",
        "/welcome/form" => "WelcomeController::form"
    ];

    public static function get(array $uri) {
        $parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        foreach($uri as $r) {
            $caminho = array_search($r, self::$rotas);

            //echo $r;
            //echo "<br>";
            //echo array_search($r, self::$rotas);
            //echo "<br>";
            //echo array_key_exists("/welcome/form/teste", self::$rotas);

            /*if(array_key_exists(array_search($r, self::$rotas), self::$rotas)){
                echo "existe";
                exit;
            } else {
                echo "num existe";
                exit;
            }*/

            switch($parse_uri) {
                case $caminho:
                    echo self::$rotas[array_search($r, self::$rotas)];
                    //call_user_func(self::$rotas[array_search($r, self::$rotas)]);
                break;
            }
        }
    }
}