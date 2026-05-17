<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 *
 * ╔══════════════════════════════════════════════════════╗
 * ║  ROUTES — sdn56_web (Website Publik)                 ║
 * ║  SD Negeri 56 Prabumulih                             ║
 * ╚══════════════════════════════════════════════════════╝
 */

// ─────────────────────────────────────────────────────
//  KONFIGURASI GLOBAL ROUTER
// ─────────────────────────────────────────────────────
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();   // CI4 pakai PageNotFoundException default
$routes->setAutoRoute(false); // matikan auto-route, semua harus eksplisit


// ═════════════════════════════════════════════════════
// BERANDA
// ═════════════════════════════════════════════════════
$routes->get('/',     'Home::index');
$routes->get('/home', static fn() => redirect()->to('/'));   // alias → beranda


// ═════════════════════════════════════════════════════
// HALAMAN STATIS — Controller: Home
// ═════════════════════════════════════════════════════
$routes->get('/tentang', 'Home::tentang');   // Profil sekolah, visi misi, guru
$routes->get('/program', 'Home::program');   // Program unggulan & fasilitas
$routes->get('/galeri',  'Home::galeri');    // Galeri foto kegiatan
$routes->get('/privasi', 'Home::privasi');   // Kebijakan Privasi


// ═════════════════════════════════════════════════════
// KONTAK — Controller: Home
// ═════════════════════════════════════════════════════
$routes->get( '/kontak',        'Home::kontak');      // Halaman kontak & peta
$routes->post('/kontak/kirim',  'Home::kirimPesan');  // POST: proses form pesan


// ═════════════════════════════════════════════════════
// BERITA & KEGIATAN — Controller: Berita
// ═════════════════════════════════════════════════════
$routes->get('/berita',            'Berita::index');     // Daftar + filter kategori
                                                          // ?kategori=Prestasi
$routes->get('/berita/(:segment)', 'Berita::detail/$1'); // Detail artikel (by slug)


// ═════════════════════════════════════════════════════
// PPDB — Controller: Ppdb
// ═════════════════════════════════════════════════════
$routes->get( '/ppdb',         'Ppdb::index');   // Info PPDB + form daftar
$routes->get( '/ppdb/cek-status', 'Ppdb::cekStatus'); // Fitur cek status via NIK
$routes->get( '/ppdb/daftar',  'Ppdb::form');    // Tampilan Form Pendaftaran
$routes->post('/ppdb/daftar',  'Ppdb::daftar');  // POST: simpan pendaftaran
$routes->get( '/ppdb/cetak/(:num)', 'Ppdb::cetakPdf/$1'); // Cetak PDF Bukti Daftar

// Route untuk melayani file upload PPDB
$routes->get('uploads/ppdb/(:any)', 'Ppdb::serveFile/$1');

// ═════════════════════════════════════════════════════
// AGENDA & KALENDER — Controller: Agenda
// ═════════════════════════════════════════════════════
$routes->get('/agenda', 'Agenda::index');   // Kalender kegiatan
                                            // ?bulan=2026-04


// ─────────────────────────────────────────────────────
//  CATATAN
// ─────────────────────────────────────────────────────
//
//  Semua route admin ada di project terpisah: sdn56_admin
//
//  URL yang TIDAK terdaftar di sini → otomatis 404
//  (ditangani PageNotFoundException di Berita::detail()
//   atau error handler bawaan CI4)
//
