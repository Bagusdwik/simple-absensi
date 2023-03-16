<?php

namespace Bagus\SimpleAbsensi\Service;

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\Domain\User;
use Bagus\SimpleAbsensi\Exception\ValidationException;
use Bagus\SimpleAbsensi\Model\UserRegisterRequest;
use Bagus\SimpleAbsensi\Model\UserRegisterResponse;
use Bagus\SimpleAbsensi\Repository\AkunRepository;

class UserService
{
  private AkunRepository $akunRepository;

  function __construct(AkunRepository $akunRepository)
  {
    $this->akunRepository = $akunRepository;
  }

  public function register(UserRegisterRequest $userRegisterRequest): UserRegisterResponse
  {
    $this->validateRegist($userRegisterRequest);

    try {
      Database::beginTransaction();
      $user = $this->akunRepository->findById($userRegisterRequest->id);
      if ($user != null) {
        throw new ValidationException("Akun sudah ada!");
      }

      $user = new User();
      $user->id = bin2hex(random_bytes(4));
      $user->email = $userRegisterRequest->email;
      $user->telepon = $userRegisterRequest->telepon;
      $user->username = $userRegisterRequest->username;
      $user->nama = $userRegisterRequest->nama;
      $user->password = password_hash($userRegisterRequest->password, PASSWORD_BCRYPT);
      $user->role = "user";

      $this->akunRepository->insert($user);

      $response = new UserRegisterResponse();
      $response->user = $user;

      Database::commitTransaction();
      return $response;
    } catch (\Exception $exception) {
      Database::rollbackTransaction();
      throw $exception;
    }
  }

  private function validateRegist(UserRegisterRequest $userRegisterRequest)
  {
    if (
      $userRegisterRequest->id == null || $userRegisterRequest->email == null || $userRegisterRequest->telepon == null || $userRegisterRequest->username == null  ||
      $userRegisterRequest->nama == null || $userRegisterRequest->password == null || trim($userRegisterRequest->id) == "" || trim($userRegisterRequest->email) == "" ||
      trim($userRegisterRequest->telepon) == "" || trim($userRegisterRequest->username) == "" || trim($userRegisterRequest->password) == ""
    ) {
      throw new ValidationException("Field harus terisi semua");
    }
  }
}
