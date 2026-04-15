<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\AgendaModel;
use App\Models\GaleriModel;
use App\Models\GuruModel;
/**
 * Home Controller — sdn56_web
 * ─────────────────────────────────────────────
 *   GET /             → index()   : halaman utama dengan berita, agenda, galeri, guru
 *   GET /tentang      → tentang() : halaman tentang sekolah & profil guru
 *   GET /program      → program() : halaman program unggulan sekolah
 *   GET /galeri       → galeri()  : halaman galeri lengkap dengan filter kategori
 *   GET /kontak       → kontak()  : halaman kontak & lokasi sekolah
 *   POST /kontak/kirim → kirimPesan() : proses kirim pesan dari form kontak
 */
class Home extends BaseController
{
    private BeritaModel $beritaModel;
    private AgendaModel $agendaModel;
    private GaleriModel $galeriModel;
    private GuruModel   $guruModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->agendaModel = new AgendaModel();
        $this->galeriModel = new GaleriModel();
        $this->guruModel   = new GuruModel();
    }

    // ────────────────────────────────────────────
    // GET /
    // ────────────────────────────────────────────
    public function index(): string
    {
        return $this->render('pages/index', [
            'title'           => 'Beranda',
            'berita_terbaru'  => $this->beritaModel->getTerbaru(4),
            'agenda_aktif'    => $this->agendaModel->getAktif(4),
            'galeri_featured' => $this->galeriModel->getFeatured(7),
            'guru_list'       => $this->guruModel->getAktif(),
            'stats' => [
                'siswa'     => 512,
                'guru'      => $this->guruModel->countAll(),
                'tahun'     => 25,
                'kelulusan' => 100,
                'prestasi'  => 47,
                'ekskul'    => 6,
            ],
        ]);
    }

    // ────────────────────────────────────────────
    // GET /tentang
    // ────────────────────────────────────────────
    public function tentang(): string
    {
        return $this->render('pages/tentang', [
            'title'     => 'Tentang Kami',
            'guru_list' => $this->guruModel->getAktif(),
        ]);
    }

    // ────────────────────────────────────────────
    // GET /program
    // ────────────────────────────────────────────
    public function program(): string
    {
        return $this->render('pages/program', [
            'title' => 'Program Unggulan',
        ]);
    }

    // ────────────────────────────────────────────
    // GET /galeri
    // ────────────────────────────────────────────
    public function galeri(): string
    {
        return $this->render('pages/galeri', [
            'title'    => 'Galeri Kegiatan',
            'galeri'   => $this->galeriModel->getAll(),
            'kategori' => $this->galeriModel->getKategori(),
        ]);
    }

    // ────────────────────────────────────────────
    // GET /kontak
    // ────────────────────────────────────────────
    public function kontak(): string
    {
        return $this->render('pages/kontak', [
            'title' => 'Kontak & Lokasi',
        ]);
    }

    // ────────────────────────────────────────────
    // POST /kontak/kirim
    // ────────────────────────────────────────────
    public function kirimPesan()
    {
        $rules = [
            'nama'  => 'required|min_length[3]|max_length[150]',
            'email' => 'required|valid_email',
            'pesan' => 'required|min_length[10]|max_length[2000]',
        ];

        $messages = [
            'nama'  => ['required' => 'Nama wajib diisi.', 'min_length' => 'Nama minimal 3 karakter.'],
            'email' => ['required' => 'Email wajib diisi.', 'valid_email' => 'Format email tidak valid.'],
            'pesan' => ['required' => 'Pesan wajib diisi.', 'min_length' => 'Pesan minimal 10 karakter.'],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->to('/kontak')
                ->with('error', implode('<br>', $this->validator->getErrors()))
                ->withInput();
        }

        // TODO: simpan ke DB tabel kontak / kirim email notifikasi

        return redirect()->to('/kontak')
            ->with('success', 'Pesan Anda berhasil dikirim! Kami akan membalas dalam 1×24 jam kerja.');
    }
}