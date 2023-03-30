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
    $query = $this->koneksi->prepare("INSERT INTO absen(id, waktu) VALUES (?, ?)");
    $query->execute([
      $absensi->id, $absensi->waktu
    ]);
    return $absensi;
  }

  public function getAll()
  {
    $query = $this->koneksi->query("SELECT * FROM absen");
    $result = $query->fetchAll(\PDO::FETCH_CLASS, Absensi::class);
    return $result;
  }
}
