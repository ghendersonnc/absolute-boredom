<?php namespace App\Middleware;

class MiddlewareTwo {
    public function __invoke($request, $next) {
        $request['middlewareTwo'] = 'M2';
        return $next($request);
    }
}