<?php

namespace Bagus\SimpleAbsensi\routes;

class Views
{
  static function render(string $view, $model)
  {
    require __DIR__ . '/../view/' . $view . '.php';
  }
}
