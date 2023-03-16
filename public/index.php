<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\controller\DashboardUserController;
use Bagus\SimpleAbsensi\controller\LoginController;
use Bagus\SimpleAbsensi\controller\ProfileController;
use Bagus\SimpleAbsensi\routes\Router;
use Bagus\SimpleAbsensi\controller\HomeController;
use Bagus\SimpleAbsensi\controller\ListAbsensiController;
use Bagus\SimpleAbsensi\controller\RegisterController;
use Bagus\SimpleAbsensi\Middleware\AuthMiddleware;

Database::getConnection("development");

// GET
Router::add("GET", "/profile/([0-9a-zA-Z]*)", ProfileController::class, "index");
Router::add("GET", "/", HomeController::class, "index", []);
Router::add("GET", "/login", LoginController::class, "index", []);
Router::add("GET", "/register", RegisterController::class, "index", []);
Router::add("GET", "/list-absensi", ListAbsensiController::class, "index", []);
Router::add("GET", "/dashboard-absensi", DashboardUserController::class, "index", []);

// POST
Router::add("POST", "/register", RegisterController::class, "up", []);
Router::add("POST", "/login", LoginController::class, "up", []);
Router::run();
