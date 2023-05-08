<?php

use vendor\codeflame\Router\Router;

//Router::set_default_route(["uri" => "/", "metodo" => "WelcomeController::default"]);

Router::get(["uri" => "/welcome", "metodo" => "WelcomeController::index"]);
Router::get(["uri" => "/welcome/form", "metodo" => "WelcomeController::form"]);
Router::get(["uri" => "/validar", "metodo" => "WelcomeController::validar"]);

Router::call_route();