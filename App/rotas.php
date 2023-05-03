<?php
use App\Controller\{
    WelcomeController
};

use vendor\codeflame\Router\Router;
use vendor\codeflame\Validate\Validate;

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

Router::get(["/welcome" => "WelcomeController::index"]);

Router::router($parse_uri);