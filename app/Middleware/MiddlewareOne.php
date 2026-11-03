<?php namespace App\Middleware;

class MiddlewareOne {
    public function __invoke($request, $next) {
        $request['middlewareOne'] = 'M1';
        return $next($request);
    }

}