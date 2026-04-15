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
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields  = [
        'nama', 'tempat_lahir', 'tgl_lahir',
        'nama_ortu', 'telepon', 'email',
        'asal', 'usia', 'status', 'tgl_daftar', 'catatan',
    ];

    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';
    protected $deletedField   = 'deleted_at';

    // ── Validasi ───────────────────────────────
    protected $validationRules = [
        'nama'         => 'required|min_length[3]|max_length[150]',
        'tempat_lahir' => 'required|max_length[100]',
        'tgl_lahir'    => 'required|valid_date[Y-m-d]',
        'nama_ortu'    => 'required|min_length[3]|max_length[150]',
        'telepon'      => 'required|min_length[9]|max_length[20]',
        'email'        => 'required|valid_email|max_length[100]',
        'usia'         => 'permit_empty|integer',
        'status'       => 'required|in_list[Menunggu,Diterima,Ditolak]',
        'tgl_daftar'   => 'required|valid_date[Y-m-d]',
    ];

    protected $validationMessages = [
        'nama'   => ['required' => 'Nama lengkap siswa wajib diisi.'],
        'email'  => ['required' => 'Email orang tua wajib diisi.', 'valid_email' => 'Format email tidak valid.'],
        'status' => ['in_list'  => 'Status tidak valid.'],
    ];

    protected $skipValidation = false;

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