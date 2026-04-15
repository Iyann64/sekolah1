<?php

namespace App\Controllers;

use App\Models\PpdbModel;

/**
 * Ppdb Controller — sdn56_web
 * ─────────────────────────────────────────────
 *   GET  /ppdb          → index()  : halaman info + form pendaftaran
 *   POST /ppdb/daftar   → daftar() : proses form & simpan ke DB
 */
class Ppdb extends BaseController
{
    private PpdbModel $model;

    /**
     * Konfigurasi PPDB — sesuaikan setiap tahun ajaran baru.
     * Status: 'Belum Dibuka' | 'Sedang Berlangsung' | 'Ditutup'
     */
    private const CONFIG = [
        'tgl_buka'  => '1 April 2026',
        'tgl_tutup' => '31 Mei 2026',
        'kuota'     => '4 Rombongan Belajar',
        'usia'      => '6 – 7 Tahun',
        'status'    => 'Belum Dibuka',
    ];

    public function __construct()
    {
        $this->model = new PpdbModel();
    }

    // ────────────────────────────────────────────
    // GET /ppdb
    // ────────────────────────────────────────────
    public function index(): string
    {
        return $this->render('pages/ppdb', [
            'title'  => 'PPDB 2026/2027',
            'config' => self::CONFIG,
        ]);
    }

    // ────────────────────────────────────────────
    // POST /ppdb/daftar
    // ────────────────────────────────────────────
    public function daftar()
    {
        // Cek status pendaftaran
        if (self::CONFIG['status'] !== 'Sedang Berlangsung') {
            return redirect()->to('/ppdb')
                ->with('error', 'Pendaftaran PPDB belum/sudah ditutup. Silakan pantau website kami.');
        }

        // Aturan validasi
        $rules = [
            'nama_lengkap' => 'required|min_length[3]|max_length[150]',
            'tempat_lahir' => 'required|max_length[100]',
            'tgl_lahir'    => 'required|valid_date[Y-m-d]',
            'nama_ortu'    => 'required|min_length[3]|max_length[150]',
            'telepon'      => 'required|min_length[9]|max_length[20]',
            'email'        => 'required|valid_email|max_length[100]',
            'usia'         => 'permit_empty|integer|greater_than[4]|less_than[10]',
            'asal_sekolah' => 'permit_empty|max_length[150]',
        ];

        $messages = [
            'nama_lengkap' => ['required'     => 'Nama lengkap wajib diisi.',     'min_length' => 'Nama minimal 3 karakter.'],
            'tempat_lahir' => ['required'     => 'Tempat lahir wajib diisi.'],
            'tgl_lahir'    => ['required'     => 'Tanggal lahir wajib diisi.',    'valid_date' => 'Format tanggal tidak valid.'],
            'nama_ortu'    => ['required'     => 'Nama orang tua wajib diisi.'],
            'telepon'      => ['required'     => 'Nomor telepon wajib diisi.',    'min_length' => 'Nomor telepon minimal 9 digit.'],
            'email'        => ['required'     => 'Email wajib diisi.',            'valid_email' => 'Format email tidak valid.'],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->to('/ppdb')
                ->with('error', implode('<br>', $this->validator->getErrors()))
                ->withInput();
        }

        // Cek email belum terdaftar di tahun yang sama
        $tahun = date('Y');
        if ($this->model->sudahDaftar($this->request->getPost('email'), $tahun)) {
            return redirect()->to('/ppdb')
                ->with('error', 'Email ini sudah digunakan untuk mendaftar PPDB tahun ' . $tahun . '.')
                ->withInput();
        }

        // Simpan data
        $this->model->insert([
            'nama'         => $this->request->getPost('nama_lengkap'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir'    => $this->request->getPost('tgl_lahir'),
            'nama_ortu'    => $this->request->getPost('nama_ortu'),
            'telepon'      => $this->request->getPost('telepon'),
            'email'        => $this->request->getPost('email'),
            'asal'         => $this->request->getPost('asal_sekolah') ?: '-',
            'usia'         => (int) $this->request->getPost('usia'),
            'status'       => 'Menunggu',
            'tgl_daftar'   => date('Y-m-d'),
        ]);

        $noPendaftaran = 'PPDB-' . date('Ymd') . '-' . str_pad($this->model->getInsertID(), 4, '0', STR_PAD_LEFT);

        return redirect()->to('/ppdb')
            ->with('success', 'Pendaftaran berhasil dikirim! No. Pendaftaran Anda: <strong>' . $noPendaftaran . '</strong>. Kami akan menghubungi Anda setelah verifikasi data.');
    }
}