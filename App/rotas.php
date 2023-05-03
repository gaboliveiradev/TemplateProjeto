<?php
use App\Controller\{
    WelcomeController
};

use vendor\codeflame\Router\Router;
use vendor\codeflame\Validate\Validate;

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

Router::get(["/welcome" => "WelcomeController::index"]);
Router::get(["/pessoa" => "PessoaController::index"]);
/*switch($parse_uri) {
    case "/teste/cpf":
        Validate::CNPJ("");
    break;

    default:
        http_response_code(404);
    break;
}*/