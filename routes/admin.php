<?php
$route = $_SERVER['REQUEST_URI'];


switch ($route) {
    case '/admin/dashboard':
    case '/admin':
        include_once __DIR__ . "/../pages/admin/dashboard.php";
        break;
    default:
        http_response_code(404);
        include_once __DIR__ . "/../pages/errors/404.php";
}