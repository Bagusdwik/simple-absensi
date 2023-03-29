<?php

namespace Bagus\SimpleAbsensi\Service;

use Bagus\SimpleAbsensi\Domain\Session;
use Bagus\SimpleAbsensi\Domain\User;
use Bagus\SimpleAbsensi\Repository\AkunRepository;
use Bagus\SimpleAbsensi\Repository\SessionRepository;

class SessionService
{
  public static string $COOKIE_NAME = "X-COOKIE-ABSEN";
  private SessionRepository $sessionRepository;
  private AkunRepository $akunRepository;

  function __construct(SessionRepository $sessionRepository, AkunRepository $akunRepository)
  {
    $this->sessionRepository = $sessionRepository;
    $this->akunRepository = $akunRepository;
  }

  public function create(string $akun_id): Session
  {
    $session = new Session();
    $session->id = uniqid();
    $session->akun_id = $akun_id;

    $this->sessionRepository->insert($session);

    setcookie(self::$COOKIE_NAME, $session->id, time() + (60 * 60 * 5), "/");

    return $session;
  }

  public function destroy()
  {
    $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
    $this->sessionRepository->deleteById($sessionId);
    setcookie(self::$COOKIE_NAME, '', 1, "/");
  }

  public function current(): ?User
  {
    $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
    $session = $this->sessionRepository->findById($sessionId);
    if ($session == null) {
      return null;
    }

    return $this->akunRepository->findById($session->akun_id);
  }

  public function getRole(): ?string
  {
    $user = $this->current();
    if ($user == null) {
      return null;
    }

    return $user->role;
  }
}
