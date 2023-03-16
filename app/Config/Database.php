<?php

namespace Bagus\SimpleAbsensi\Config;

class Database
{
  private static ?\PDO $pdo = null;

  static function getConnection(string $env = "test"): \PDO
  {
    if (self::$pdo == null) {
      // buat koneksi baru
      require_once __DIR__ . "/../../connection/connection-setup.php";
      $config = getDatabaseConfig();
      self::$pdo = new \PDO(
        $config["database"][$env]["host"],
        $config["database"][$env]["username"],
        $config["database"][$env]["password"]
      );
    }
    return self::$pdo;
  }

  public static function beginTransaction()
  {
    self::$pdo->beginTransaction();
  }

  public static function commitTransaction()
  {
    self::$pdo->commit();
  }

  public static function rollbackTransaction()
  {
    self::$pdo->rollBack();
  }
}
