<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * GuruModel — sdn56_web
 * ─────────────────────────────────────────────
 * Tabel : guru
 * Kolom : id, nama, nip, jabatan, mapel,
 *         status, avatar,
 *         created_at, updated_at, deleted_at
 */
class GuruModel extends Model
{
    protected $table          = 'guru';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields  = [
        'nama', 'nip', 'jabatan', 'mapel', 'status', 'avatar',
    ];

    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';
    protected $deletedField   = 'deleted_at';

    // ── Validasi ───────────────────────────────
    protected $validationRules = [
        'nama'    => 'required|min_length[3]|max_length[150]',
        'nip'     => 'required|max_length[20]|is_unique[guru.nip,id,{id}]',
        'jabatan' => 'required|max_length[100]',
        'status'  => 'required|in_list[Aktif,Cuti,Pensiun]',
    ];

    protected $validationMessages = [
        'nip' => ['is_unique' => 'NIP ini sudah terdaftar.'],
    ];

    protected $skipValidation = false;

    // ── Query Helpers ──────────────────────────

    /**
     * Ambil semua guru berstatus Aktif,
     * diurutkan: Kepala Sekolah dulu, lalu alfabetis jabatan
     */
    public function getAktif(): array
    {
        return $this->where('status', 'Aktif')
                    ->orderBy("FIELD(jabatan, 'Kepala Sekolah')", 'DESC', false)
                    ->orderBy('jabatan', 'ASC')
                    ->orderBy('nama',    'ASC')
                    ->findAll();
    }

    /**
     * Ambil guru berdasarkan jabatan tertentu
     */
    public function getByJabatan(string $jabatan): array
    {
        return $this->where('jabatan', $jabatan)
                    ->where('status', 'Aktif')
                    ->orderBy('nama', 'ASC')
                    ->findAll();
    }

    /**
     * Jumlah guru yang aktif (untuk stats di beranda)
     */
    public function jumlahAktif(): int
    {
        return $this->where('status', 'Aktif')->countAllResults();
    }
}