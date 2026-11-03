<?php

namespace App\Controllers;

class AboutController {
    public function index($request = null): void {
        $page = APP_DIR . "/pages/web/about.php";
        include_once APP_DIR . "/templates/main.php";
    }
}