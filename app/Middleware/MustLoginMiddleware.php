<?php

namespace Bagus\SimpleAbsensi\Middleware;

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\Repository\AkunRepository;
use Bagus\SimpleAbsensi\Repository\SessionRepository;
use Bagus\SimpleAbsensi\routes\Views;
use Bagus\SimpleAbsensi\Service\SessionService;

class MustLoginMiddleware implements Middleware
{
  private SessionService $sessionService;

  public function __construct()
  {
    $sessionRepository = new SessionRepository(Database::getConnection());
    $akunRepository = new AkunRepository(Database::getConnection());
    $this->sessionService = new SessionService($sessionRepository, $akunRepository);
  }
  function before(): void
  {
    $user = $this->sessionService->current();
    if ($user == null) {
      Views::redirect("/login");
    }
  }
}
