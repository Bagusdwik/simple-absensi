<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\routes\Views;

class UpdateProfileController
{
  function index()
  {
    $model = [
      "title" => "Update Profile"
    ];

    Views::render('updateProfile', $model);
  }
}
