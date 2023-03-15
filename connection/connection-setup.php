<?php

function getDatabaseConfig(): array
{
  return [
    "database" => [
      "develpoment" => [
        "host" => "mysql:host=localhost:3306;dbname=absensi",
        "username" => "root",
        "password" => ""
      ],
      "test" => [
        "host" => "mysql:host=localhost:3306;dbname=absensi_test",
        "username" => "root",
        "password" => ""
      ]
    ]
  ];
}
