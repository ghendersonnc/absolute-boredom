<?php

namespace App\Controllers;

class HomeController {
    public function index($request = null): void {
        $request['hello'] = 'add something to controller';
        $page = APP_DIR . "/pages/web/home.php";
        include_once APP_DIR . "/templates/main.php";
    }
}