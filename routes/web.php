<?php

use App\Controllers\AboutController;
use App\Controllers\HomeController;
use App\Middleware\MiddlewareOne;
use App\Middleware\MiddlewareTwo;
use App\Route;

$route = explode('?', $_SERVER['REQUEST_URI'])[0];
$routing = new Route();
switch ($route) {
    case '/home':
    case '/index':
    case '/index.php':
    case '/index.html':
    case '/':
        $routing->httpMethod('GET');
        $middlewares = [new MiddlewareOne(), new MiddlewareTwo()];
        $runner = $routing->createRunner($middlewares, [new HomeController(), 'index']);
        $runner();
        break;
    case '/about':
        $routing->httpMethod('GET');
        $runner = $routing->createRunner([], [new AboutController(), 'index']);
        $runner();
        break;
    default:
        http_response_code(404);
        include_once __DIR__ . "/../pages/errors/404.php";
}