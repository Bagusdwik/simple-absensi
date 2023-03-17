<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\Exception\ValidationException;
use Bagus\SimpleAbsensi\Model\UserLoginRequest;
use Bagus\SimpleAbsensi\routes\Views;
use Bagus\SimpleAbsensi\Repository\AkunRepository;
use Bagus\SimpleAbsensi\Service\UserService;
use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\Domain\User;
use Bagus\SimpleAbsensi\Repository\SessionRepository;
use Bagus\SimpleAbsensi\Service\SessionService;

class LoginController
{
  private UserService $userService;
  private SessionService $sessionService;

  function __construct()
  {
    $koneksi = Database::getConnection();
    $akunRepository = new AkunRepository($koneksi);
    $this->userService = new UserService($akunRepository);

    $sessionRepository = new SessionRepository($koneksi);
    $this->sessionService = new SessionService($sessionRepository, $akunRepository);
  }
  public function index()
  {
    Views::render('login', [
      "title" => "Login"
    ]);
  }

  public function up()
  {
    $request = new UserLoginRequest();
    $request->email = $_POST['email'];
    $request->password = $_POST['password'];


    try {
      $user = $this->userService->login($request);
      $this->sessionService->create($user->user->id);
      if ($user->user->role == "user") {
        Views::redirect('/dashboard-absensi');
      } else {
        Views::redirect('/list-absensi');
      }
    } catch (ValidationException $exception) {
      Views::render('login', [
        "title" => "Login",
        "error" => $exception->getMessage()
      ]);
    }
  }

  public function logout()
  {
    $this->sessionService->destroy();
    Views::redirect("/");
  }
}
