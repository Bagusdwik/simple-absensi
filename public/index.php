<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Bagus\SimpleAbsensi\controller\LoginController;
use Bagus\SimpleAbsensi\controller\ProfileController;
use Bagus\SimpleAbsensi\routes\Router;
use Bagus\SimpleAbsensi\controller\HomeController;
use Bagus\SimpleAbsensi\Middleware\AuthMiddleware;

Router::add("GET", "/profile/([0-9a-zA-Z]*)", ProfileController::class, "index");
Router::add("GET", "/home", HomeController::class, "index", [AuthMiddleware::class]);
Router::add("GET", "/login", LoginController::class, "index");
Router::add("GET", "/register", "loginController", "register");

Router::run();
