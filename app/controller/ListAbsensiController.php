<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\Repository\AbsensiRepository;
use Bagus\SimpleAbsensi\Repository\AkunRepository;
use Bagus\SimpleAbsensi\Repository\SessionRepository;
use Bagus\SimpleAbsensi\routes\Views;
use Bagus\SimpleAbsensi\Service\AbsensiService;
use Bagus\SimpleAbsensi\Service\SessionService;

class ListAbsensiController
{
  private SessionService $sessionService;
  private AbsensiService $absensiService;
  private AbsensiRepository $absensiRepository;
  public function __construct()
  {
    $koneksi = Database::getConnection();
    $sessionRepository = new SessionRepository($koneksi);
    $absensiRepository = new AbsensiRepository($koneksi);
    $akunRepository = new AkunRepository($koneksi);

    $this->sessionService = new SessionService($sessionRepository, $akunRepository);
    $this->absensiService = new AbsensiService($absensiRepository, $akunRepository);
    $this->absensiRepository = $absensiRepository;
  }

  public function index()
  {
    $user = $this->sessionService->current();
    if ($user == null) {
      Views::render('login', [
        "title" => "Login"
      ]);
    } else {
      $absensiList = $this->absensiRepository->getAll();
      Views::render('listAbsensi', [
        "title" => "List Absensi",
        "user" => $user->nama,
        "absensiList" => $absensiList
      ]);
    }
  }
}
