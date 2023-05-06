<?php

use vendor\codeflame\Router\Router;

Router::get(["uri" => "/welcome", "metodo" => "WelcomeController::index"]);
Router::get(["uri" => "/", "metodo" => "WelcomeController::default"]);
Router::get(["uri" => "/welcome/form", "metodo" => "WelcomeController::form"]);

Router::call_route();