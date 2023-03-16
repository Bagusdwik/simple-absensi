<?php

namespace Bagus\SimpleAbsensi\Repository;

use Bagus\SimpleAbsensi\Domain\User;

class AkunRepository
{
  private \PDO $koneksi;

  function __construct(\PDO $koneksi)
  {
    $this->koneksi = $koneksi;
  }

  public function insert(User $user): User
  {
    $query = $this->koneksi->prepare("INSERT INTO akun(id, email, telepon, username, nama, password, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $query->execute([
      $user->id, $user->email, $user->telepon, $user->username, $user->nama, $user->password, $user->role
    ]);
    return $user;
  }

  public function findById(string $id): ?User
  {
    $query = $this->koneksi->prepare("SELECT * FROM akun WHERE id = ?");
    $query->execute([$id]);

    try {
      if ($row = $query->fetch()) {
        $user = new User();
        $user->id = $row['id'];
        $user->email = $row['email'];
        $user->telepon = $row['telepon'];
        $user->username = $row['username'];
        $user->nama = $row['nama'];
        $user->password = $row['password'];
        $user->role = $row['role'];
        return $user;
      } else {
        return null;
      }
    } finally {
      $query->closeCursor();
    }
  }

  public function findByEmail(string $email): ?User
  {
    $query = $this->koneksi->prepare("SELECT * FROM akun WHERE email = ?");
    $query->execute([$email]);

    try {
      if ($row = $query->fetch()) {
        $user = new User();
        $user->id = $row['id'];
        $user->email = $row['email'];
        $user->telepon = $row['telepon'];
        $user->username = $row['username'];
        $user->nama = $row['nama'];
        $user->password = $row['password'];
        $user->role = $row['role'];
        return $user;
      } else {
        return null;
      }
    } finally {
      $query->closeCursor();
    }
  }

  public function deleteAll(): void
  {
    $this->koneksi->exec("DELETE FROM akun");
  }
}
