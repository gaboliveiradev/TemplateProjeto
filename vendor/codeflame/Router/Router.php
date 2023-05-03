<?php 
namespace vendor\codeflame\Router;

class Router {
    static $rotas = [];

    public static function get(array $url) {

        foreach($url as $r) {
            //var_dump($url);

            // Verificar se o indice da array informada pelo usuário existe na array $rotas.

            // array_key_exists = verifica se uma key existe em uma determinada array.
            // array_search = retorna a key com base no valor informado

            /*if(array_key_exists(array_search($r, $url), self::$rotas)) {
                var_dump(self::$rotas);
            } else {
                self::$rotas[array_search($r, $url)] = $r;
                echo "Rota criada!";
            }*/
        }

        array_push(self::$rotas, ["/pessoa" => "PessoaController"]);

        var_dump(self::$rotas);

        //echo self::$rotas["/pessoa"];
    }
}