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
        'status'    => 'Sedang Berlangsung',
    ];

    public function __construct()
    {
        $this->model = new PpdbModel();
    }

    // ────────────────────────────────────────────
    // GET /ppdb/cek-status
    // ────────────────────────────────────────────
    public function cekStatus()
    {
        $nik = $this->request->getGet('nik');
        $siswa = null;

        if ($nik) {
            $siswa = $this->model->where('nik_siswa', $nik)->first();
            if (!$siswa) {
                return redirect()->to('/ppdb#cek-status')->with('error_cek', 'Data dengan NIK tersebut tidak ditemukan.');
            }
        }

        return $this->render('pages/ppdb', [
            'title'  => 'Cek Status PPDB',
            'config' => self::CONFIG,
            'siswa'  => $siswa
        ]);
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
            'nik_siswa'    => 'required|numeric|min_length[16]|max_length[16]',
            'jenis_kelamin'=> 'required|in_list[Laki-laki,Perempuan]',
            'agama'        => 'required',
            'tempat_lahir' => 'required|max_length[100]',
            'tgl_lahir'    => 'required|valid_date[Y-m-d]',
            'nama_ortu'    => 'required|min_length[3]|max_length[150]',
            'nik_ortu'     => 'required|numeric|min_length[16]|max_length[16]',
            'telepon'      => 'required|min_length[9]|max_length[20]',
            'email'        => 'required|valid_email|max_length[100]',
            'alamat'       => 'required|min_length[10]',
            'agama_ortu'   => 'required',
            'hubungan'     => 'required|in_list[Ayah,Ibu,Wali]',
            'kode_pos'     => 'permit_empty|numeric|min_length[5]',
            'usia'         => 'permit_empty|integer|greater_than[4]|less_than[10]',
            'asal_sekolah' => 'permit_empty|max_length[150]',
            // Validasi File
            'file_akta'    => 'uploaded[file_akta]|max_size[file_akta,2048]|ext_in[file_akta,pdf,jpg,jpeg,png]',
            'file_kk'      => 'uploaded[file_kk]|max_size[file_kk,2048]|ext_in[file_kk,pdf,jpg,jpeg,png]',
            'file_ktp_ortu'=> 'uploaded[file_ktp_ortu]|max_size[file_ktp_ortu,2048]|ext_in[file_ktp_ortu,pdf,jpg,jpeg,png]',
            'file_foto_siswa'=> 'uploaded[file_foto_siswa]|max_size[file_foto_siswa,2048]|is_image[file_foto_siswa]',
            'file_imunisasi' => 'uploaded[file_imunisasi]|max_size[file_imunisasi,2048]|ext_in[file_imunisasi,pdf,jpg,jpeg,png]',
            'file_surat_sehat'=> 'uploaded[file_surat_sehat]|max_size[file_surat_sehat,2048]|ext_in[file_surat_sehat,pdf,jpg,jpeg,png]',
            'file_ijazah_tk' => 'permit_empty|max_size[file_ijazah_tk,2048]|ext_in[file_ijazah_tk,pdf,jpg,jpeg,png]',
            'file_pernyataan'=> 'uploaded[file_pernyataan]|max_size[file_pernyataan,2048]|ext_in[file_pernyataan,pdf,jpg,jpeg,png]',
        ];

        $messages = [
            'nama_lengkap' => ['required' => 'Nama lengkap siswa wajib diisi.'],
            'nik_siswa'    => [
                'required' => 'NIK Siswa wajib diisi.',
                'numeric'  => 'NIK Siswa harus berupa angka.',
                'min_length' => 'NIK Siswa harus 16 digit.',
                'max_length' => 'NIK Siswa harus 16 digit.'
            ],
            'nik_ortu'     => [
                'required' => 'NIK Orang Tua wajib diisi.',
                'numeric'  => 'NIK Orang Tua harus berupa angka.',
                'min_length' => 'NIK Orang Tua harus 16 digit.',
                'max_length' => 'NIK Orang Tua harus 16 digit.'
            ],
            'tgl_lahir'    => ['valid_date' => 'Format tanggal lahir tidak valid (gunakan pemilih tanggal).'],
            'email'        => ['valid_email' => 'Format email orang tua tidak valid.'],
            'alamat'       => ['min_length' => 'Alamat lengkap minimal 10 karakter.'],
            'file_akta'    => ['uploaded' => 'File Akta Kelahiran wajib diunggah.', 'max_size' => 'Ukuran file Akta maksimal 2MB.'],
            'file_kk'      => ['uploaded' => 'File Kartu Keluarga wajib diunggah.'],
            'file_ktp_ortu'=> ['uploaded' => 'File KTP Orang Tua wajib diunggah.'],
            'file_foto_siswa'=> ['uploaded' => 'Pas foto siswa wajib diunggah.'],
            'file_imunisasi' => ['uploaded' => 'File Kartu Imunisasi wajib diunggah.'],
            'file_surat_sehat'=> ['uploaded' => 'Surat Keterangan Sehat wajib diunggah.'],
            'file_pernyataan'=> ['uploaded' => 'Surat Pernyataan Orang Tua wajib diunggah.'],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->to('/ppdb#form-daftar')
                ->with('error', implode('<br>', $this->validator->getErrors()))
                ->withInput();
        }

        // Cek email belum terdaftar di tahun yang sama
        $tahun = date('Y');
        if ($this->model->sudahDaftar($this->request->getPost('email'), $tahun)) {
            return redirect()->to('/ppdb#form-daftar')
                ->with('error', 'Email ini sudah digunakan untuk mendaftar PPDB tahun ' . $tahun . '.')
                ->withInput();
        }

        // Simpan data
        $dataInsert = [
            'nama'         => $this->request->getPost('nama_lengkap'),
            'nik_siswa'    => $this->request->getPost('nik_siswa'),
            'nisn'         => $this->request->getPost('nisn'),
            'jenis_kelamin'=> $this->request->getPost('jenis_kelamin'),
            'agama'        => $this->request->getPost('agama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir'    => $this->request->getPost('tgl_lahir'),
            'kewarganegaraan' => $this->request->getPost('kewarganegaraan'),
            'status_kesehatan' => $this->request->getPost('status_kesehatan'),
            'nama_ortu'    => $this->request->getPost('nama_ortu'),
            'nik_ortu'     => $this->request->getPost('nik_ortu'),
            'pekerjaan_ortu' => $this->request->getPost('pekerjaan_ortu'),
            'agama_ortu'   => $this->request->getPost('agama_ortu'),
            'telepon'      => $this->request->getPost('telepon'),
            'email'        => $this->request->getPost('email'),
            'alamat'       => $this->request->getPost('alamat'),
            'kode_pos'     => $this->request->getPost('kode_pos'),
            'hubungan'     => $this->request->getPost('hubungan'),
            'asal'         => $this->request->getPost('asal_sekolah') ?: '-',
            'usia'         => (int) $this->request->getPost('usia'),
            'status'       => 'Menunggu',
            'tgl_daftar'   => date('Y-m-d'),
        ];

        // Proses Upload File
        $docFields = [
            'file_akta', 'file_kk', 'file_ktp_ortu', 'file_foto_siswa',
            'file_imunisasi', 'file_surat_sehat', 'file_ijazah_tk', 'file_pernyataan'
        ];

        foreach ($docFields as $field) {
            $file = $this->request->getFile($field);
            if ($file && $file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'uploads/ppdb', $newName);
                $dataInsert[$field] = $newName;
            }
        }

        if (! $this->model->insert($dataInsert)) {
            return redirect()->to('/ppdb#form-daftar')
                ->with('error', 'Gagal menyimpan ke database: ' . implode(', ', $this->model->errors()))
                ->withInput();
        }

        $noPendaftaran = 'PPDB-' . date('Ymd') . '-' . str_pad($this->model->getInsertID(), 4, '0', STR_PAD_LEFT);

        return redirect()->to('/ppdb')
            ->with('success', 'Pendaftaran berhasil dikirim! No. Pendaftaran Anda: <strong>' . $noPendaftaran . '</strong>. Kami akan menghubungi Anda setelah verifikasi data.');
    }
}