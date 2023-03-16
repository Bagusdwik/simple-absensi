<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\routes\Views;

class HomeController
{
  function index()
  {
    $model = [
      "title" => "Home"
    ];

    Views::render('index', $model);
  }
}
