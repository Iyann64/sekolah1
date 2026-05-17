<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController — sdn56_web
 * ─────────────────────────────────────────────
 * Parent untuk semua Controller website publik.
 * Menyediakan:
 *   - $data    : array data global (site_name, logo, dll)
 *   - render() : wrapper view dengan layout utama
 */
abstract class BaseController extends Controller
{
    /** Helper yang di-load otomatis di semua controller */
    protected $helpers = ['url', 'form', 'html', 'text'];

    /** Data global yang tersedia di semua View */
    protected array $data = [];

    public function initController(
        RequestInterface  $request,
        ResponseInterface $response,
        LoggerInterface   $logger
    ): void {
        parent::initController($request, $response, $logger);

        $this->data = [
            'site_name'    => 'SD Negeri 56 Prabumulih',
            'site_tagline' => 'Cerdas · Berkarakter · Berprestasi',
            'site_email'   => 'sdnegeri56pbm@gmail.com',
            'site_phone'   => '(0713) 123-4567',
            'site_wa'      => '6281234567890',
            'site_address' => 'Jl. Pendidikan No. 56, Prabumulih, Sumatera Selatan 31124',
            'logo_url'     => base_url('assets/img/logo.png'),
            'upload_url'   => base_url('uploads/'), 
        ];
    }

    /**
     * Render halaman menggunakan layouts/main.php
     *
     * @param  string $page   Path view, relatif dari app/Views/
     *                        Contoh: 'pages/index', 'pages/berita/list'
     * @param  array  $extra  Data tambahan khusus halaman ini
     * @return string         HTML output
     */
    protected function render(string $page, array $extra = []): string
    {
        $data                 = array_merge($this->data, $extra);
        $data['content_view'] = $page;
        return view('layouts/main', $data);
    }

    /**
     * Menghasilkan template pesan WhatsApp berdasarkan status PPDB
     */
    protected function generatePpdbMessage(string $nama_ortu, string $nama_siswa, string $status, string $no_pendaftaran): string
    {
        $site_name = $this->data['site_name'];
        $header = "Halo *{$nama_ortu}*,\n\n";

        switch ($status) {
            case 'Diterima':
                $msg = $header . 
                       "🎉 *SELAMAT!* Calon siswa atas nama *{$nama_siswa}* dinyatakan *DITERIMA* di {$site_name}.\n\n" .
                       "*No. Pendaftaran:* {$no_pendaftaran}\n\n" .
                       "Silakan segera melakukan daftar ulang sesuai jadwal yang telah ditentukan. Anda dapat mengunduh bukti penerimaan di website kami.\n\n" .
                       "Selamat bergabung bersama kami!";
                break;

            case 'Ditolak':
                $msg = $header . 
                       "Kami menginformasikan bahwa pendaftaran atas nama *{$nama_siswa}* belum dapat kami setujui ( *DITOLAK* ).\n\n" .
                       "*No. Pendaftaran:* {$no_pendaftaran}\n\n" .
                       "Terima kasih telah berpartisipasi dalam proses seleksi ini. Tetap semangat dan semoga sukses di kesempatan lainnya.";
                break;

            default: // Menunggu / Default
                $msg = $header . 
                       "Pendaftaran PPDB di *{$site_name}* untuk calon siswa *{$nama_siswa}* telah kami terima.\n\n" .
                       "*No. Pendaftaran:* {$no_pendaftaran}\n" .
                       "*Status:* Menunggu Verifikasi\n\n" .
                       "Mohon menunggu informasi selanjutnya. Anda dapat mengecek status secara berkala di website resmi kami.\n\n" .
                       "Terima kasih.";
                break;
        }

        return $msg;
    }

    /**
     * Membuat link Click to Chat WhatsApp
     */
    protected function getWhatsappLink(string $phone, string $message = ''): string
    {
        $target = $this->formatPhoneNumber($phone);
        return "https://api.whatsapp.com/send?phone={$target}&text=" . urlencode($message);
    }

    /**
     * Mengirim pesan WhatsApp via Gateway (Contoh: Fonnte)
     */
    protected function sendWhatsapp(string $target, string $message): bool
    {
        $token = 'YOUR_FONNTE_TOKEN'; // Ganti dengan token API Fonnte Anda

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'target' => $target,
                'message' => $message,
                'countryCode' => '62',
            ],
            CURLOPT_HTTPHEADER => [
                "Authorization: $token"
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response ? true : false;
    }

    /**
     * Format nomor telepon ke format internasional (628...)
     */
    protected function formatPhoneNumber(string $phone): string
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        } elseif (str_starts_with($phone, '8')) {
            $phone = '62' . $phone;
        }
        return $phone;
    }
}