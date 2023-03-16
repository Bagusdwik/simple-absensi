<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\routes\Views;

class DashboardUserController
{
  public function index()
  {
    Views::render('dashboardUser', [
      "title" => "Dashboard"
    ]);
  }
}
