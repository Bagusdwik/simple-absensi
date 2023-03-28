<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\controller\DashboardUserController;
use Bagus\SimpleAbsensi\controller\LoginController;
use Bagus\SimpleAbsensi\controller\UpdatePasswordController;
use Bagus\SimpleAbsensi\controller\UpdateProfileController;
use Bagus\SimpleAbsensi\routes\Router;
use Bagus\SimpleAbsensi\controller\HomeController;
use Bagus\SimpleAbsensi\controller\ListAbsensiController;
use Bagus\SimpleAbsensi\controller\RegisterController;
use Bagus\SimpleAbsensi\Middleware\BeforeLoginMiddleware;
use Bagus\SimpleAbsensi\Middleware\MustLoginMiddleware;

Database::getConnection("development");

// GET
Router::add("GET", "/update-profile", UpdateProfileController::class, "index", [MustLoginMiddleware::class]);
Router::add("GET", "/update-password", UpdatePasswordController::class, "index", [MustLoginMiddleware::class]);
Router::add("GET", "/", HomeController::class, "index", []);
Router::add("GET", "/login", LoginController::class, "index", [BeforeLoginMiddleware::class]);
Router::add("GET", "/register", RegisterController::class, "index", [BeforeLoginMiddleware::class]);
Router::add("GET", "/list-absensi", ListAbsensiController::class, "index", [MustLoginMiddleware::class]);
Router::add("GET", "/dashboard-absensi", DashboardUserController::class, "index", [MustLoginMiddleware::class]);
Router::add("GET", "/logout", LoginController::class, "logout", [MustLoginMiddleware::class]);

// POST
Router::add("POST", "/register", RegisterController::class, "up", [BeforeLoginMiddleware::class]);
Router::add("POST", "/login", LoginController::class, "up", [BeforeLoginMiddleware::class]);
Router::add("POST", "/absensi", DashboardUserController::class, "absen", [MustLoginMiddleware::class]);
Router::add("POST", "/update-profile", UpdateProfileController::class, "up", [MustLoginMiddleware::class]);

// RUN
Router::run();
