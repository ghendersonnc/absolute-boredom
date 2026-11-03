<?php

namespace App;

class Route {
    public function httpMethod($method) {
        if ($_SERVER['REQUEST_METHOD'] !== $method) {
            http_response_code(405);
            include_once APP_DIR . "/pages/errors/405.php";
            exit;
        }
    }

    public function createRunner($middlewares, $controller) {
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
}