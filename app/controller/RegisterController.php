<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\routes\Views;

class RegisterController
{
  public function index()
  {
    Views::render('register', [
      "title" => "Register"
    ]);
  }
}
