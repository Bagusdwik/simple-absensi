<?php

namespace Bagus\SimpleAbsensi\Service;

use Bagus\SimpleAbsensi\Config\Database;
use Bagus\SimpleAbsensi\Domain\Absensi;
use Bagus\SimpleAbsensi\Exception\ValidationException;
use Bagus\SimpleAbsensi\Model\UserAbsensiRequest;
use Bagus\SimpleAbsensi\Model\UserAbsensiResponse;
use Bagus\SimpleAbsensi\Repository\AbsensiRepository;
use Bagus\SimpleAbsensi\Repository\AkunRepository;

class AbsensiService
{
  private AbsensiRepository $absensiRepository;
  private AkunRepository $akunRepository;

  public function __construct(AbsensiRepository $absensiRepository, AkunRepository $akunRepository)
  {
    $this->absensiRepository = $absensiRepository;
    $this->akunRepository = $akunRepository;
  }

  public function insert(UserAbsensiRequest $request): UserAbsensiResponse
  {
    $this->validateAbsen($request);

    try {

      // Memperoleh informasi file
      // $file = $request->dokumen;
      // var_dump($file);

      // // Mendapatkan ekstensi file
      // $ext = pathinfo($file, PATHINFO_EXTENSION);

      // // Mendefinisikan jenis file yang diizinkan
      // $allowed_ext = ['pdf', 'doc', 'docx'];

      // Validasi ekstensi file
      // if (!in_array($ext, $allowed_ext)) {
      //   throw new ValidationException("Tipe dokumen tidak diizinkan, Hanya PDF, DOC, DOCX");
      // }

      // // Validasi ukuran file
      // if (strlen(file_get_contents($file)) > 10485760) { // 10MB
      //   throw new ValidationException("Ukuran dokumen terlalu besar, Batas 10MB");
      // }

      // $content = file_get_contents($file);

      $absensi = new Absensi();
      $absensi->id = $request->id;
      $absensi->waktu = date('l jS \of F Y h:i:s A');
      // $absensi->dokumen = $content;

      $this->absensiRepository->insert($absensi);

      $response = new UserAbsensiResponse;
      $response->absensi = $absensi;
      return $response;
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function validateAbsen(UserAbsensiRequest $request)
  {
    if ($request->id == null) {
      throw new ValidationException("Tidak boleh kosong");
    }
  }
}
