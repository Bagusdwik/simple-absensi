<?php

namespace Bagus\SimpleAbsensi\Service;

use Bagus\SimpleAbsensi\Repository\AbsensiRepository;

class AbsensiService
{
  private AbsensiRepository $absensi;

  public function __construct(AbsensiRepository $absensi)
  {
  }
}
