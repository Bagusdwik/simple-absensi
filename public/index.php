<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Bagus\SimpleAbsensi\routes\Router;
use Bagus\SimpleAbsensi\controller\HomeController;

Router::add("GET", "/", HomeController::class, "index");
Router::add("GET", "/login", "loginController", "login");
Router::add("GET", "/register", "loginController", "register");

Router::run();
