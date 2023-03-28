<?php

namespace Bagus\SimpleAbsensi\Service;

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\Domain\User;
use Bagus\SimpleAbsensi\Exception\ValidationException;
use Bagus\SimpleAbsensi\Model\UserLoginRequest;
use Bagus\SimpleAbsensi\Model\UserLoginResponse;
use Bagus\SimpleAbsensi\Model\UserRegisterRequest;
use Bagus\SimpleAbsensi\Model\UserRegisterResponse;
use Bagus\SimpleAbsensi\Model\UserUpdateRequest;
use Bagus\SimpleAbsensi\Model\UserUpdateResponse;
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

  public function login(UserLoginRequest $loginRequest): UserLoginResponse
  {
    $this->validateLogin($loginRequest);

    $user = $this->akunRepository->findByEmail($loginRequest->email);
    if ($user == null) {
      throw new ValidationException("Email atau Password Salah!!!");
    }

    if (password_verify($loginRequest->password, $user->password)) {
      $response = new UserLoginResponse();
      $response->user = $user;
      return $response;
    } else {
      throw new ValidationException("Email atau Password Salah!!!");
    }
  }

  private function validateLogin(UserLoginRequest $loginRequest)
  {
    if (
      $loginRequest->email == null || $loginRequest->password == null ||
      trim($loginRequest->email) == "" || trim($loginRequest->email) == ""
    ) {
      throw new ValidationException("Isi yang benar ajg!!");
    }
  }

  public function update(UserUpdateRequest $request): UserUpdateResponse
  {
    $this->validateUpdate($request);

    try {
      Database::beginTransaction();

      $user = $this->akunRepository->findById($request->id);
      if ($user == null) {
        throw new ValidationException("User Tidak Ditemukan");
      }
      $user->email = $request->email;
      $user->telepon = $request->telepon;
      $user->username = $request->username;
      $user->nama = $request->nama;
      $this->akunRepository->update($user);

      Database::commitTransaction();

      $response = new UserUpdateResponse;
      $response->user = $user;
      return $response;
    } catch (\Exception $exception) {
      Database::rollbackTransaction();
      throw $exception;
    }
  }

  private function validateUpdate(UserUpdateRequest $updateRequest)
  {
    if (
      $updateRequest->email == null || $updateRequest->telepon == null || $updateRequest->username == null  ||
      $updateRequest->nama == null || trim($updateRequest->email) == "" ||
      trim($updateRequest->telepon) == "" || trim($updateRequest->username) == "" || trim($updateRequest->nama) == ""
    ) {
      throw new ValidationException("Field harus terisi semua");
    }
  }
}
