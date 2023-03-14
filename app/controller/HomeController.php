<?php

namespace Bagus\SimpleAbsensi\controller;

use Bagus\SimpleAbsensi\routes\Views;

class HomeController
{
  function index()
  {
    $model = [
      "title" => "MVC",
      "content" => "HTML"
    ];

    Views::render('index', $model);
  }

  function up()
  {
    echo "HomeController.up()";
  }

  function down()
  {
    echo "HomeController.down()";
  }
}
