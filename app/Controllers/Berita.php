<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

/**
 * Berita Controller — sdn56_web
 * ─────────────────────────────────────────────
 *   GET /berita               → index()  : daftar berita + filter + paginasi
 *   GET /berita/(:segment)    → detail() : isi artikel berdasarkan slug
 */
class Berita extends BaseController
{
    private BeritaModel $model;

    /** Daftar kategori yang tersedia */
    private const KATEGORI = [
        'Prestasi',
        'Kegiatan',
        'Akademik',
        'Lingkungan',
        'Seni Budaya',
        'Olahraga',
    ];

    public function __construct()
    {
        $this->model = new BeritaModel();
    }

    // ────────────────────────────────────────────
    // GET /berita
    // GET /berita?kategori=Prestasi
    // ────────────────────────────────────────────
    public function index(): string
    {
        $perPage  = 9;
        $kategori = $this->request->getGet('kategori');

        // Validasi: kategori harus salah satu yang terdaftar
        if ($kategori && ! in_array($kategori, self::KATEGORI)) {
            $kategori = null;
        }

        return $this->render('pages/berita/list', [
            'title'         => 'Berita & Kegiatan',
            'berita'        => $this->model->getPaged($perPage, $kategori),
            'pager'         => $this->model->pager,
            'kategori'      => $kategori,
            'kategori_list' => self::KATEGORI,
        ]);
    }

    // ────────────────────────────────────────────
    // GET /berita/{slug}
    // ────────────────────────────────────────────
    public function detail(string $slug): string
    {
        // Sanitasi slug — hanya huruf, angka, tanda hubung
        $slug   = preg_replace('/[^a-z0-9\-]/', '', strtolower($slug));
        $berita = $this->model->getBySlug($slug);

        if (! $berita) {
            throw new PageNotFoundException('Berita "' . esc($slug) . '" tidak ditemukan.');
        }

        // Tambah counter views (+1)
        $this->model->tambahViews($berita['id']);

        return $this->render('pages/berita/detail', [
            'title'          => $berita['judul'],
            'berita'         => $berita,
            'berita_terkait' => $this->model->getTerkait(
                id       : $berita['id'],
                kategori : $berita['kategori'],
                limit    : 3
            ),
        ]);
    }
}