<?php

namespace Bagus\SimpleAbsensi\controller;

class ProfileController
{
  function index(string $userId): void
  {
    echo "Profile UserId $userId";
  }
}
