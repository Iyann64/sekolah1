<?php

namespace App\Controllers;

use App\Models\PpdbModel;
use App\Models\PpdbConfigModel;
use App\Models\PpdbJadwalModel;
use App\Models\PpdbDokumenModel;

/**
 * Ppdb Controller — sdn56_web
 * ─────────────────────────────────────────────
 *   GET  /ppdb          → index()  : halaman info + form pendaftaran
 *   POST /ppdb/daftar   → daftar() : proses form & simpan ke DB
 */
class Ppdb extends BaseController
{
    private PpdbModel $model;
    private PpdbConfigModel $configModel;
    private PpdbJadwalModel $jadwalModel;
    private PpdbDokumenModel $dokumenModel;

    public function __construct()
    {
        $this->model = new PpdbModel();
        $this->configModel = new PpdbConfigModel();
        $this->jadwalModel = new PpdbJadwalModel();
        $this->dokumenModel = new PpdbDokumenModel();
    }

    /**
     * Ambil konfigurasi PPDB dari database
     */
    private function getConfig()
    {
        return $this->configModel->getAll();
    }

    // ────────────────────────────────────────────
    // GET /ppdb/cek-status
    // ────────────────────────────────────────────
    public function cekStatus()
    {
        $nik = $this->request->getGet('nik');
        $siswa = null;
        $config = $this->getConfig();
        $dokumen = $this->dokumenModel->getDaftar();

        if ($nik) {
            $siswa = $this->model->where('nik_siswa', $nik)->first();
            if (!$siswa) {
                return redirect()->to('/ppdb#cek-status')->with('error_cek', 'Data dengan NIK tersebut tidak ditemukan.');
            }
        }

        return $this->render('pages/ppdb', [
            'title'    => 'Cek Status PPDB',
            'config'   => $config,
            'dokumen'  => $dokumen,
            'siswa'    => $siswa
        ]);
    }

    public function cetakPdf($id)
    {
        $siswa = $this->model->find($id);
        if (!$siswa) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $config = $this->getConfig();
        $jadwal = $this->jadwalModel->getAktif();
        $dokumen = $this->dokumenModel->getDaftar();

        return view('pages/ppdb_pdf', array_merge($this->data, [
            'siswa'   => $siswa,
            'config'  => $config,
            'jadwal'  => $jadwal,
            'dokumen' => $dokumen,
        ]));
    }

    // ────────────────────────────────────────────
    // GET /ppdb/daftar (Halaman Form)
    // ────────────────────────────────────────────
    public function form(): string
    {
        $config = $this->getConfig();
        $dokumen = $this->dokumenModel->getDaftar();
        return $this->render('pages/ppdb_form', [
            'title'   => 'Formulir Pendaftaran PPDB',
            'config'  => $config,
            'dokumen' => $dokumen,
        ]);
    }

    // ────────────────────────────────────────────
    // GET /ppdb
    // ────────────────────────────────────────────
    public function index(): string
    {
        $config = $this->getConfig();
        $dokumen = $this->dokumenModel->getDaftar();
        return $this->render('pages/ppdb', [
            'title'   => 'PPDB 2026/2027',
            'config'  => $config,
            'dokumen' => $dokumen,
        ]);
    }

    // ────────────────────────────────────────────
    // POST /ppdb/daftar
    // ────────────────────────────────────────────
    public function daftar()
    {
        $config = $this->getConfig();

        // Cek status pendaftaran
        if ($config['status'] !== 'Sedang Berlangsung') {
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
            'jalur_pendaftaran' => 'required|in_list[Afirmasi,Mutasi Kerja Orang Tua,Domisili]',
            // Validasi File
            'file_akta'    => 'uploaded[file_akta]|max_size[file_akta,5120]|ext_in[file_akta,pdf,jpg,jpeg,png]',
            'file_kk'      => 'uploaded[file_kk]|max_size[file_kk,5120]|ext_in[file_kk,pdf,jpg,jpeg,png]',
            'file_ktp_ortu'=> 'uploaded[file_ktp_ortu]|max_size[file_ktp_ortu,5120]|ext_in[file_ktp_ortu,pdf,jpg,jpeg,png]',
            'file_foto_siswa'=> 'uploaded[file_foto_siswa]|max_size[file_foto_siswa,5120]|is_image[file_foto_siswa]',
            'file_imunisasi' => 'uploaded[file_imunisasi]|max_size[file_imunisasi,5120]|ext_in[file_imunisasi,pdf,jpg,jpeg,png]',
            'file_surat_sehat'=> 'uploaded[file_surat_sehat]|max_size[file_surat_sehat,5120]|ext_in[file_surat_sehat,pdf,jpg,jpeg,png]',
            'file_ijazah_tk' => 'permit_empty|max_size[file_ijazah_tk,5120]|ext_in[file_ijazah_tk,pdf,jpg,jpeg,png]',
            'file_pernyataan'=> 'uploaded[file_pernyataan]|max_size[file_pernyataan,5120]|ext_in[file_pernyataan,pdf,jpg,jpeg,png]',
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
            'jalur_pendaftaran' => ['required' => 'Silakan pilih jalur pendaftaran.'],
            'tgl_lahir'    => ['valid_date' => 'Format tanggal lahir tidak valid (gunakan pemilih tanggal).'],
            'email'        => ['valid_email' => 'Format email orang tua tidak valid.'],
            'alamat'       => ['min_length' => 'Alamat lengkap minimal 10 karakter.'], // Pesan ini tidak berubah
            'file_akta'    => ['uploaded' => 'File Akta Kelahiran wajib diunggah.', 'max_size' => 'Ukuran file Akta maksimal 5MB.'],
            'file_kk'      => ['uploaded' => 'File Kartu Keluarga wajib diunggah.', 'max_size' => 'Ukuran file KK maksimal 5MB.'],
            'file_ktp_ortu'=> ['uploaded' => 'File KTP Orang Tua wajib diunggah.', 'max_size' => 'Ukuran file KTP maksimal 5MB.'],
            'file_foto_siswa'=> ['uploaded' => 'Pas foto siswa wajib diunggah.', 'max_size' => 'Ukuran pas foto maksimal 5MB.'],
            'file_imunisasi' => ['uploaded' => 'File Kartu Imunisasi wajib diunggah.', 'max_size' => 'Ukuran file Imunisasi maksimal 5MB.'],
            'file_surat_sehat'=> ['uploaded' => 'Surat Keterangan Sehat wajib diunggah.', 'max_size' => 'Ukuran file Surat Sehat maksimal 5MB.'],
            'file_pernyataan'=> ['uploaded' => 'Surat Pernyataan Orang Tua wajib diunggah.', 'max_size' => 'Ukuran file Pernyataan maksimal 5MB.'],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->to('/ppdb/daftar')
                ->with('error', implode('<br>', $this->validator->getErrors()))
                ->withInput();
        }

        // Cek email belum terdaftar di tahun yang sama
        $tahun = date('Y');
        if ($this->model->sudahDaftar($this->request->getPost('email'), $tahun)) {
            return redirect()->to('/ppdb/daftar')
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
            'jalur_pendaftaran' => $this->request->getPost('jalur_pendaftaran'),
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
            return redirect()->to('/ppdb/daftar')
                ->with('error', 'Gagal menyimpan ke database: ' . implode(', ', $this->model->errors()))
                ->withInput();
        }

        $insertID = $this->model->getInsertID();
        $noPendaftaran = 'PPDB-' . date('Ymd') . '-' . str_pad($insertID, 4, '0', STR_PAD_LEFT);

        // 1. Kirim Notifikasi Background menggunakan helper dari BaseController
        $pesanWa = $this->generatePpdbMessage($dataInsert['nama_ortu'], $dataInsert['nama'], 'Menunggu', $noPendaftaran);
        $this->sendWhatsapp($this->formatPhoneNumber($dataInsert['telepon']), $pesanWa);

        // 2. Buat Link Konfirmasi Manual untuk ditampilkan di web (Click to Chat)
        $linkKonfirmasi = $this->getWhatsappLink($this->data['site_wa'], "Halo Admin, saya baru saja mendaftar PPDB Online.\n\nNama Siswa: {$dataInsert['nama']}\nNo. Pendaftaran: {$noPendaftaran}\n\nMohon bantuannya untuk verifikasi berkas. Terima kasih.");

        return redirect()->to('/ppdb')
            ->with('success', 'Pendaftaran berhasil dikirim! No. Pendaftaran Anda: <strong>' . $noPendaftaran . '</strong>.' . 
                '<br><br>' . 
                '<a href="'.base_url('ppdb/cetak/'.$insertID).'" target="_blank" class="btn-hero-p" style="padding:8px 16px; font-size:13px; margin-right:5px;">🖨️ Cetak Bukti</a>' .
                '<a href="'.$linkKonfirmasi.'" target="_blank" class="btn-hero-s" style="padding:8px 16px; font-size:13px; color:#25D366; border-color:#25D366;">💬 Konfirmasi via WA</a>'
            );
    }

    /**
     * Melayani request file upload PPDB agar tidak 404
     */
    public function serveFile(string $filename)
    {
        $path = FCPATH . 'uploads/ppdb/' . $filename;

        if (! is_file($path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("File $filename tidak ditemukan.");
        }

        // Mengalirkan file ke browser (inline) dengan mime-type yang sesuai
        return $this->response->download($path, null)->inline();
    }
}