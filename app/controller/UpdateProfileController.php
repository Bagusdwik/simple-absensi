<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\Exception\ValidationException;
use Bagus\SimpleAbsensi\Model\UserUpdateRequest;
use Bagus\SimpleAbsensi\Repository\AkunRepository;
use Bagus\SimpleAbsensi\Repository\SessionRepository;
use Bagus\SimpleAbsensi\routes\Views;
use Bagus\SimpleAbsensi\Service\SessionService;
use Bagus\SimpleAbsensi\Service\UserService;

class UpdateProfileController
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
      "title" => "Update Profile",
      "User" => [
        "id" => $user->id,
        "name" => $user->nama,
        "username" => $user->username,
        "email" => $user->email,
        "telepon" => $user->telepon
      ]
    ];

    Views::render('updateProfile', $model);
  }

  function up()
  {
    $user = $this->sessionService->current();

    $req = new UserUpdateRequest;
    $req->id = $user->id;
    $req->email = $_POST['email'];
    $req->nama = $_POST['nama'];
    $req->username = $_POST['username'];
    $req->telepon = $_POST['telepon'];

    try {
      $this->userService->update($req);

      Views::redirect('update-profile');
    } catch (ValidationException $exception) {
      Views::render('updateProfile', [
        "title" => "Update Profile",
        "error" => $exception->getMessage(),
        "User" => [
          "id" => $user->id,
          "name" => $user->nama,
          "username" => $user->username,
          "email" => $user->email,
          "telepon" => $user->telepon
        ]
      ]);
    }
  }
}
