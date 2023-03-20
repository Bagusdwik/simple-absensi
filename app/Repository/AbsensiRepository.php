<?php

namespace Bagus\SimpleAbsensi\Repository;

use Bagus\SimpleAbsensi\Domain\Absensi;

class AbsensiRepository
{
  private \PDO $koneksi;

  function __construct(\PDO $koneksi)
  {
    $this->koneksi = $koneksi;
  }

  public function insert(Absensi $absensi): Absensi
  {
    $query = $this->koneksi->prepare("INSERT INTO absen(id, waktu, dokumen) VALUES (?, ?, ?)");
    $query->execute([
      $absensi->id, $absensi->waktu, $absensi->dokumen
    ]);
    return $absensi;
  }
}
