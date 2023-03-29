<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\Exception\ValidationException;
use Bagus\SimpleAbsensi\Model\UserUpdatePasswordRequest;
use Bagus\SimpleAbsensi\Repository\AkunRepository;
use Bagus\SimpleAbsensi\Repository\SessionRepository;
use Bagus\SimpleAbsensi\routes\Views;
use Bagus\SimpleAbsensi\Service\SessionService;
use Bagus\SimpleAbsensi\Service\UserService;

class UpdatePasswordController
{
  private UserService $userService;
  private SessionService $sessionService;

  public function __construct()
  {
    $koneksi = Database::getConnection();
    $akunRepository = new AkunRepository($koneksi);
    $this->userService = new UserService($akunRepository);

    $sessionRepository = new SessionRepository($koneksi);
    $this->sessionService = new SessionService($sessionRepository, $akunRepository);
  }

  function index()
  {
    $user = $this->sessionService->current();
    $model = [
      "title" => "Update Password"
    ];

    Views::render('updatePassword', $model);
  }

  function up()
  {
    $user = $this->sessionService->current();
    $req = new UserUpdatePasswordRequest();
    $req->id = $user->id;
    $req->oldPassword = $_POST['oldPassword'];
    $req->newPassword = $_POST['newPassword'];
    $req->confirmPassword = $_POST['confirmPassword'];

    try {
      $this->userService->updatePassword($req);
      Views::redirect('update-password');
    } catch (ValidationException $exception) {
      $model = [
        "title" => "Update Password",
        "error" => $exception->getMessage(),
        "success" => "Update Password Success"
      ];

      Views::render('updatePassword', $model);
    }
  }
}
