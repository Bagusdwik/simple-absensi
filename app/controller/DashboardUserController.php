<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\Exception\ValidationException;
use Bagus\SimpleAbsensi\Model\UserAbsensiRequest;
use Bagus\SimpleAbsensi\Repository\AbsensiRepository;
use Bagus\SimpleAbsensi\Repository\AkunRepository;
use Bagus\SimpleAbsensi\Repository\SessionRepository;
use Bagus\SimpleAbsensi\routes\Views;
use Bagus\SimpleAbsensi\Service\AbsensiService;
use Bagus\SimpleAbsensi\Service\SessionService;
use Bagus\SimpleAbsensi\Service\UserService;

class DashboardUserController
{
  private SessionService $sessionService;
  private AbsensiService $absensiService;
  private UserService $userService;

  public function __construct()
  {
    $koneksi = Database::getConnection();
    $akunRepository = new AkunRepository($koneksi);
    $this->userService = new UserService($akunRepository);

    $sessionRepository = new SessionRepository($koneksi);
    $this->sessionService = new SessionService($sessionRepository, $akunRepository);

    $absensiRepository = new AbsensiRepository($koneksi);
    $this->absensiService = new AbsensiService($absensiRepository, $akunRepository);
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
        "title" => "Dashboard",
        "User" => $user->nama
      ]);
    }
  }

  public function up()
  {
    $user = $this->sessionService->current();
    $req = new UserAbsensiRequest;
    $req->id = $user->id;
    $req->waktu = date('l jS \of F Y h:i:s A');
    var_dump($req->waktu);
    // $req->dokumen = $_FILES['pakta']['name'];

    try {
      $this->absensiService->insert($req);
      Views::redirect('dashboard-absensi');
    } catch (ValidationException $exception) {
      $model = [
        "title" => "Dashboard",
        "error" => $exception->getMessage()
      ];

      Views::render('dashboardUser', $model);
    }
  }
}
