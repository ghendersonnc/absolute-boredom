<?php

use App\Controllers\AboutController;
use App\Controllers\HomeController;
use App\Middleware\MiddlewareOne;
use App\Middleware\MiddlewareTwo;

$route = explode('?', $_SERVER['REQUEST_URI'])[0];

function createRunner($middlewares, $controller) {
    return array_reduce(
        array_reverse($middlewares),
        function ($next, $middleware) {
            return function ($request = []) use ($middleware, $next) {
                return $middleware($request, $next);
            };
        },
        $controller
    );
}

switch ($route) {
    case '/home':
    case '/':
        $middlewares = [new MiddlewareOne(), new MiddlewareTwo()];
        $runner = createRunner($middlewares, [new HomeController(), 'index']);
        $runner();
        break;
    case '/about':
        $runner = createRunner([], [new AboutController(), 'index']);
        $runner();
        break;
    default:
        http_response_code(404);
        include_once __DIR__ . "/../pages/errors/404.php";
}