<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * PpdbModel — sdn56_web
 * ─────────────────────────────────────────────
 * Tabel : ppdb
 * Kolom : id, nama, tempat_lahir, tgl_lahir,
 *         nama_ortu, telepon, email, asal, usia,
 *         status, tgl_daftar, catatan,
 *         created_at, updated_at, deleted_at
 */
class PpdbModel extends Model
{
    protected $table          = 'ppdb';
    protected $primaryKey     = 'id_ppdb';
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields  = [
        'nama', 'nik_siswa', 'nisn', 'jenis_kelamin', 'agama', 
        'tempat_lahir', 'tgl_lahir', 'kewarganegaraan', 'status_kesehatan',
        'nama_ortu', 'nik_ortu', 'pekerjaan_ortu', 'agama_ortu', 'telepon', 
        'email', 'alamat', 'kode_pos', 'hubungan', 'asal', 'jalur_pendaftaran', 'usia', 'status', 'tgl_daftar', 'catatan',
        'file_akta', 'file_kk', 'file_ktp_ortu', 'file_foto_siswa', 
        'file_imunisasi', 'file_surat_sehat', 'file_ijazah_tk', 'file_pernyataan',
    ];

    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';
    protected $deletedField   = 'deleted_at';

    /**
     * Matikan validasi otomatis di Model karena sudah ditangani 
     * secara manual di Controller dengan pemetaan field yang lebih kompleks.
     */
    protected $validationRules = [];
    protected $skipValidation  = true;

    // ── Query Helpers ──────────────────────────

    /**
     * Cek apakah email sudah mendaftar di tahun yang sama
     * (mencegah pendaftaran ganda)
     */
    public function sudahDaftar(string $email, string $tahun): bool
    {
        return $this->where('email', $email)
                    ->where("YEAR(tgl_daftar)", (int) $tahun)
                    ->first() !== null;
    }

    /**
     * Hitung pendaftar berdasarkan status
     */
    public function hitungByStatus(): array
    {
        $rows = $this->select('status, COUNT(*) as total')
            ->groupBy('status')
            ->findAll();

        $result = ['Menunggu' => 0, 'Diterima' => 0, 'Ditolak' => 0];
        foreach ($rows as $row) {
            $result[$row['status']] = (int) $row['total'];
        }
        $result['total'] = array_sum($result);
        return $result;
    }

    /**
     * Ambil daftar pendaftar berdasarkan status
     */
    public function getByStatus(string $status): array
    {
        return $this->where('status', $status)
                    ->orderBy('tgl_daftar', 'DESC')
                    ->findAll();
    }

    /**
     * Ambil pendaftar terbaru (untuk dashboard admin)
     */
    public function getTerbaru(int $limit = 5): array
    {
        return $this->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }
}