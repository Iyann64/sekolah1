<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * GaleriModel — sdn56_web
 * ─────────────────────────────────────────────
 * Tabel : galeri
 * Kolom : id, nama, kategori, emoji, file_foto,
 *         created_at, updated_at, deleted_at
 */
class GaleriModel extends Model
{
    protected $table          = 'galeri';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields  = [
        'nama', 'kategori', 'emoji', 'file_foto',
    ];

    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';
    protected $deletedField   = 'deleted_at';

    // ── Validasi ───────────────────────────────
    protected $validationRules = [
        'nama'     => 'required|min_length[3]|max_length[200]',
        'kategori' => 'required|in_list[Kegiatan,Prestasi,Fasilitas,Lingkungan,Olahraga,Seni Budaya]',
    ];

    protected $skipValidation = false;

    // ── Query Helpers ──────────────────────────

    /**
     * Ambil foto terbaru untuk ditampilkan di homepage (galeri grid)
     */
    public function getFeatured(int $limit = 7): array
    {
        return $this->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Ambil semua foto, urut terbaru
     */
    public function getAll(): array
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }

    /**
     * Ambil foto berdasarkan kategori
     */
    public function getByKategori(string $kategori): array
    {
        return $this->where('kategori', $kategori)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Daftar kategori unik yang ada di galeri
     */
    public function getKategori(): array
    {
        $rows = $this->select('kategori')
            ->distinct()
            ->orderBy('kategori', 'ASC')
            ->findAll();
        return array_column($rows, 'kategori');
    }
}