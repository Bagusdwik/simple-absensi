<?php

namespace Bagus\SimpleAbsensi\Middleware;

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\Repository\AkunRepository;
use Bagus\SimpleAbsensi\Repository\SessionRepository;
use Bagus\SimpleAbsensi\routes\Views;
use Bagus\SimpleAbsensi\Service\SessionService;
use Bagus\SimpleAbsensi\Service\UserService;

class AuthMiddleware implements Middleware
{
  private SessionService $sessionService;
  private UserService $userService;

  public function __construct()
  {
    $koneksi = Database::getConnection();
    $sessionRepository = new SessionRepository($koneksi);

    $akunRepository = new AkunRepository($koneksi);
    $this->userService = new UserService($akunRepository);
    $this->sessionService = new SessionService($sessionRepository, $akunRepository);
  }
  function before(): void
  {
    $userr = $this->sessionService->current();
    if ($userr == null) {
      Views::redirect("/login");
    }

    $role = $this->sessionService->getRole();
    if ($role !== "admin") {
      http_response_code(404);
      $model = [
        "title" => "404"
      ];
      Views::render('404', $model);
    }
  }
}
