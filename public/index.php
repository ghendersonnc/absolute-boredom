<?php
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../config/constants.php";

if (str_starts_with($_SERVER['REQUEST_URI'], '/admin')) {
    require_once __DIR__ . "/../routes/admin.php";
} else  {
    require_once __DIR__ . "/../routes/web.php";
}
