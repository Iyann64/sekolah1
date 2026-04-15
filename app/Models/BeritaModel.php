<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * BeritaModel — sdn56_web
 * ─────────────────────────────────────────────
 * Tabel : berita
 * Kolom : id, judul, slug, kategori, isi,
 *         thumbnail, status, tanggal, views,
 *         created_at, updated_at, deleted_at
 */
class BeritaModel extends Model
{
    protected $table          = 'berita';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields  = [
        'judul', 'slug', 'kategori', 'isi',
        'thumbnail', 'status', 'tanggal', 'views',
    ];

    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';
    protected $deletedField   = 'deleted_at';

    // ── Validasi ───────────────────────────────
    protected $validationRules = [
        'judul'    => 'required|min_length[5]|max_length[255]',
        'slug'     => 'required|max_length[255]|is_unique[berita.slug,id,{id}]',
        'kategori' => 'required|in_list[Prestasi,Kegiatan,Akademik,Lingkungan,Seni Budaya,Olahraga]',
        'status'   => 'required|in_list[Terbit,Draf]',
        'tanggal'  => 'required|valid_date[Y-m-d]',
        'isi'      => 'required',
    ];

    protected $validationMessages = [
        'judul'    => ['required'   => 'Judul berita wajib diisi.', 'min_length' => 'Judul minimal 5 karakter.'],
        'slug'     => ['is_unique'  => 'Slug ini sudah digunakan, silakan gunakan judul yang berbeda.'],
        'kategori' => ['in_list'    => 'Kategori tidak valid.'],
        'tanggal'  => ['valid_date' => 'Format tanggal tidak valid.'],
    ];

    protected $skipValidation = false;

    // ── Query Helpers ──────────────────────────

    /**
     * Ambil N berita terbaru berstatus Terbit
     */
    public function getTerbaru(int $limit = 5): array
    {
        return $this->where('status', 'Terbit')
                    ->orderBy('tanggal', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Ambil berita dengan paginasi, filter kategori opsional
     */
    public function getPaged(int $perPage = 9, ?string $kategori = null): array
    {
        if ($kategori) {
            $this->where('kategori', $kategori);
        }
        return $this->where('status', 'Terbit')
                    ->orderBy('tanggal', 'DESC')
                    ->paginate($perPage);
    }

    /**
     * Ambil satu berita berdasarkan slug (hanya yang Terbit)
     */
    public function getBySlug(string $slug): ?array
    {
        return $this->where('slug', $slug)
                    ->where('status', 'Terbit')
                    ->first();
    }

    /**
     * Ambil berita terkait berdasarkan kategori yang sama
     * (kecuali artikel yang sedang dibuka)
     */
    public function getTerkait(int $id, string $kategori, int $limit = 3): array
    {
        return $this->where('kategori', $kategori)
                    ->where('id !=', $id)
                    ->where('status', 'Terbit')
                    ->orderBy('tanggal', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Tambah penghitung views sebesar 1
     */
    public function tambahViews(int $id): void
    {
        $this->set('views', 'views + 1', false)
            ->where('id', $id)
            ->update();
    }

    /**
     * Cari berita berdasarkan kata kunci (judul / isi)
     */
    public function cari(string $keyword, int $limit = 10): array
    {
        return $this->groupStart()
                        ->like('judul', $keyword)
                        ->orLike('isi', $keyword)
                    ->groupEnd()
                    ->where('status', 'Terbit')
                    ->orderBy('tanggal', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Generate slug unik dari judul
     */
    public function buatSlug(string $judul): string
    {
        $slug = url_title(strtolower($judul), '-', true);
        $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);

        $base  = $slug;
        $i     = 1;
        while ($this->where('slug', $slug)->first()) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }
}