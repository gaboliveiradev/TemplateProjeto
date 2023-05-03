<?php

use vendor\codeflame\Router\Router;

Router::get(["/welcome" => "WelcomeController::index"]);
Router::get(["/welcome/form" => "WelcomeController::form"]);
//Router::get(["/welcome/save" => "WelcomeController::save"]);