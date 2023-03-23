<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\Repository\AkunRepository;
use Bagus\SimpleAbsensi\Repository\SessionRepository;
use Bagus\SimpleAbsensi\routes\Views;
use Bagus\SimpleAbsensi\Service\SessionService;

class DashboardUserController
{
  private SessionService $sessionService;
  public function __construct()
  {
    $koneksi = Database::getConnection();
    $sessionRepository = new SessionRepository($koneksi);
    $akunRepository = new AkunRepository($koneksi);
    $this->sessionService = new SessionService($sessionRepository, $akunRepository);
  }
  public function index()
  {
    $user = $this->sessionService->current();
    if ($user == null) {
      Views::render('login', [
        "title" => "Login"
      ]);
    } else {
      Views::render('dashboardUser', [
        "title" => "Dashboard"
      ]);
    }
  }
}
