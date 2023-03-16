<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\routes\Views;

class ListAbsensiController
{
  public function index()
  {
    Views::render('listAbsensi', [
      "title" => "List Absensi"
    ]);
  }
}
