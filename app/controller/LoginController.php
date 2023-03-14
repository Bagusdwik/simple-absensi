<?php

namespace Bagus\SimpleAbsensi\controller;

class LoginController
{
  public function index()
  {
    $model = [
      "title" => "Login"
    ];

    require __DIR__ . '/../view/login.php';
  }

  public function up()
  {
    $request = [
      "username" => $_POST['username'],
      "password" => $_POST['password']
    ];

    $user = [];

    $response = http_response_code(200);
  }
}
