<?php

namespace Bagus\SimpleAbsensi\Middleware;

interface Middleware
{
  function before(): void;
}
