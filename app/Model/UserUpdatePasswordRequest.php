<?php

namespace Bagus\SimpleAbsensi\Model;

class UserUpdatePasswordRequest
{
  public ?string $id = null;
  public ?string $oldPassword = null;
  public ?string $newPassword = null;
  public ?string $confirmPassword = null;
}
