<?php

namespace Bagus\SimpleAbsensi\routes;

class Views
{
  static function render(string $view, $model)
  {
    require __DIR__ . '/../view/Template/header.php';
    require __DIR__ . '/../view/' . $view . '.php';
    require __DIR__ . '/../view/Template/footer.php';
  }

  static function redirect(string $url)
  {
    header("Location: $url ");
    exit();
  }
}
