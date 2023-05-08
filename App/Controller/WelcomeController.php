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
        if(Validate::CNPJ("58.577.114.0001-89")) {
            echo "CNPJ VÁLIDO <br>";
        } else {
            echo "CNPJ INVÁLIDO <br>";
        }

        if(Validate::CPF("544.243.098-60")) {
            echo "CPF VÁLIDO <br>";
        } else {
            echo "CPF INVÁLIDO <br> ";
        }

        if(Validate::Email("gabriel@teste.com")) {
            echo "EMAIL VÁLIDO <br>";
        } else {
            echo "EMAIL INVÁLIDO <br> ";
        }
    }
}