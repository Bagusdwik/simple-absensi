<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\Exception\ValidationException;
use Bagus\SimpleAbsensi\Model\UserRegisterRequest;
use Bagus\SimpleAbsensi\Repository\AkunRepository;
use Bagus\SimpleAbsensi\routes\Views;
use Bagus\SimpleAbsensi\Service\UserService;

class RegisterController
{
  private UserService $userService;

  function __construct()
  {
    $koneksi = Database::getConnection();
    $akunRepository = new AkunRepository($koneksi);
    $this->userService = new UserService($akunRepository);
  }
  public function index()
  {
    Views::render('register', [
      "title" => "Register"
      // "error" => "Cek yang bener lah!!!"
    ]);
  }

  public function up()
  {
    $request = new UserRegisterRequest();
    $request->id = bin2hex(random_bytes(4));
    $request->email = $_POST['email'];
    $request->telepon = $_POST['telepon'];
    $request->username = $_POST['username'];
    $request->nama = $_POST['nama'];
    $request->password = $_POST['password'];
    $request->role = "user";

    try {
      $this->userService->register($request);
      // sukses
      Views::redirect('/login');
    } catch (ValidationException $exception) {
      Views::render('register', [
        "title" => "Register",
        "error" => $exception->getMessage()
      ]);
    }
  }
}
