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
            'logo_url'     => base_url('assets/img/logo.jpg'),
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
}