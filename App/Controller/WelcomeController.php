<?php
namespace App\Controller;

use vendor\codeflame\Validate\Validate;

class WelcomeController extends Controller {

    public static function index() {
        echo "deu certo | exibe uma página";
    }

    public static function form() {
        echo "deu certo | exibe um formulário";
    }

    public static function default() {
        echo "<br> rota padrão <br>";
    }

    public static function validar() {
        if(Validate::CNPJ("11.111.123.0001-11")) {
            echo "CNPJ VÁLIDO <br>";
        } else {
            echo "CNPJ INVÁLIDO <br>";
        }

        if(Validate::CPF("11111111111")) {
            echo "CPF VÁLIDO <br>";
        } else {
            echo "CPF INVÁLIDO <br>";
        }
    }
}