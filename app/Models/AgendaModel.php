<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * AgendaModel — sdn56_web
 * ─────────────────────────────────────────────
 * Tabel : agenda
 * Kolom : id, judul, tanggal, waktu, tempat,
 *         deskripsi, kategori, status,
 *         created_at, updated_at, deleted_at
 */
class AgendaModel extends Model
{
    protected $table          = 'agenda';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields  = [
        'judul', 'tanggal', 'waktu', 'tempat',
        'deskripsi', 'kategori', 'status',
    ];

    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';
    protected $deletedField   = 'deleted_at';

    // ── Validasi ───────────────────────────────
    protected $validationRules = [
        'judul'    => 'required|min_length[3]|max_length[255]',
        'tanggal'  => 'required|valid_date[Y-m-d]',
        'kategori' => 'required|in_list[Akademik,PPDB,Rapat,Upacara,Olahraga,Keagamaan,Lainnya]',
        'status'   => 'required|in_list[Aktif,Selesai,Batal]',
    ];

    protected $skipValidation = false;

    // ── Query Helpers ──────────────────────────

    /**
     * Ambil agenda aktif yang belum lewat tanggalnya
     */
    public function getAktif(int $limit = 5): array
    {
        return $this->where('status', 'Aktif')
                    ->where('tanggal >=', date('Y-m-d'))
                    ->orderBy('tanggal', 'ASC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Ambil agenda berdasarkan bulan tertentu
     * @param string|null $bulan  Format: Y-m (contoh: '2026-04')
     *                            Null = bulan ini
     */
    public function getByBulan(?string $bulan = null): array
    {
        $bulan = $bulan ?? date('Y-m');
        [$year, $month] = explode('-', $bulan);

        return $this->where("YEAR(tanggal)",  (int) $year)
                    ->where("MONTH(tanggal)", (int) $month)
                    ->orderBy('tanggal', 'ASC')
                    ->orderBy('waktu',   'ASC')
                    ->findAll();
    }

    /**
     * Ambil agenda dalam rentang tanggal tertentu
     */
    public function getByRentang(string $dari, string $sampai): array
    {
        return $this->where('tanggal >=', $dari)
                    ->where('tanggal <=', $sampai)
                    ->where('status !=', 'Batal')
                    ->orderBy('tanggal', 'ASC')
                    ->findAll();
    }
}