<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Bagus\SimpleAbsensi\routes\Router;

Router::add("GET", "/login", "loginController", "login");
Router::add("GET", "/register", "loginController", "register");

Router::run();
