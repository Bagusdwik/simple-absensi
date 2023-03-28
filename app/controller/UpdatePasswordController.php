<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\routes\Views;

class UpdatePasswordController
{
  function index()
  {
    $model = [
      "title" => "Update Password"
    ];

    Views::render('updatePassword', $model);
  }
}
