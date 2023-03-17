<?php

namespace Bagus\SimpleAbsensi\Repository;

use Bagus\SimpleAbsensi\Domain\Session;

class SessionReposirtory
{
  private \PDO $koneksi;

  public function __construct(\PDO $koneksi)
  {
    $this->koneksi = $koneksi;
  }
  public function insert(Session $session): Session
  {
    $statement = $this->koneksi->prepare("INSERT INTO sessions(id, akun_id) VALUES (?,?)");
    $statement->execute([
      $session->id, $session->akun_id
    ]);
    return $session;
  }

  public function findById(string $id): ?Session
  {
    $statement = $this->koneksi->prepare("SELECT id, akun_id FROM sessions WHERE id = ?");
    $statement->execute([$id]);

    try {
      if ($row = $statement->fetch()) {
        $session = new Session();
        $session->id = $row['id'];
        $session->akun_id = $row['akun_id'];
        return $session;
      } else {
        return null;
      }
    } finally {
      $statement->closeCursor();
    }
  }

  public function deleteById(string $id): void
  {
    $statement = $this->koneksi->prepare("DELETE FROM sessions WHERE id =?");
    $statement->execute([$id]);
  }

  function deleteAll(): void
  {
    $this->koneksi->exec("DELETE FROM sessions");
  }
}
