<?php
namespace App\Controller;

class WelcomeController extends Controller {

    public static function index() {
        echo "deu certo | exibe uma página";
    }

    public static function form() {
        echo "deu certo | exibe um formulário";
    }

    public static function default() {
        echo "rota padrão";
    }
}