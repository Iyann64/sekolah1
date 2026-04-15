-- ╔══════════════════════════════════════════════════════════════════╗
-- ║  DATABASE  :  sdn56_db                                          ║
-- ║  PROJECT   :  Website & Admin Panel SDN 56 Prabumulih           ║
-- ║  ENGINE    :  MySQL 5.7+ / MariaDB 10.3+                        ║
-- ║  CHARSET   :  utf8mb4 / utf8mb4_unicode_ci                      ║
-- ║  DIBUAT    :  2026                                               ║
-- ╚══════════════════════════════════════════════════════════════════╝
--
-- CARA IMPORT:
--   mysql -u root -p < sdn56_db.sql
-- atau lewat phpMyAdmin → Import → pilih file ini
--
-- AKUN DEFAULT SETELAH IMPORT:
--   username : admin    password : admin123   role : Super Admin
--   username : kepala   password : sdn56pbm   role : Kepala Sekolah
--   username : operator password : operator56 role : Operator
-- ─────────────────────────────────────────────────────────────────

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
SET time_zone = '+07:00';

-- ─── Buat & Gunakan Database ──────────────────────────────────────
CREATE DATABASE IF NOT EXISTS `sdn56_db`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `sdn56_db`;

-- ══════════════════════════════════════════
-- TABEL: users
-- Akun administrator panel admin
-- ══════════════════════════════════════════
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id`         INT UNSIGNED     NOT NULL AUTO_INCREMENT,
  `nama`       VARCHAR(150)     NOT NULL,
  `username`   VARCHAR(50)      NOT NULL,
  `password`   VARCHAR(255)     NOT NULL  COMMENT 'bcrypt hash',
  `email`      VARCHAR(100)     NULL,
  `telepon`    VARCHAR(20)      NULL,
  `role`       ENUM('Super Admin','Kepala Sekolah','Operator')
               NOT NULL DEFAULT 'Operator',
  `avatar`     VARCHAR(10)      NULL DEFAULT 'A',
  `created_at` DATETIME         NULL,
  `updated_at` DATETIME         NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Akun administrator';

-- ══════════════════════════════════════════
-- TABEL: berita
-- Artikel berita & kegiatan sekolah
-- ══════════════════════════════════════════
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `id`         INT UNSIGNED     NOT NULL AUTO_INCREMENT,
  `judul`      VARCHAR(255)     NOT NULL,
  `slug`       VARCHAR(255)     NOT NULL,
  `kategori`   VARCHAR(50)      NOT NULL DEFAULT 'Kegiatan',
  `isi`        LONGTEXT         NULL,
  `thumbnail`  VARCHAR(255)     NULL,
  `status`     ENUM('Terbit','Draf') NOT NULL DEFAULT 'Draf',
  `tanggal`    DATE             NOT NULL,
  `views`      INT UNSIGNED     NOT NULL DEFAULT 0,
  `created_at` DATETIME         NULL,
  `updated_at` DATETIME         NULL,
  `deleted_at` DATETIME         NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_slug` (`slug`),
  KEY `idx_status`   (`status`),
  KEY `idx_kategori` (`kategori`),
  KEY `idx_tanggal`  (`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Berita dan artikel sekolah';

-- ══════════════════════════════════════════
-- TABEL: ppdb
-- Data pendaftaran siswa baru
-- ══════════════════════════════════════════
DROP TABLE IF EXISTS `ppdb`;
CREATE TABLE `ppdb` (
  `id`          INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `nama`        VARCHAR(150)  NOT NULL,
  `tempat_lahir`VARCHAR(100)  NULL,
  `tgl_lahir`   DATE          NULL,
  `nama_ortu`   VARCHAR(150)  NULL,
  `telepon`     VARCHAR(20)   NULL,
  `email`       VARCHAR(100)  NULL,
  `asal`        VARCHAR(150)  NULL  COMMENT 'Asal TK/PAUD',
  `usia`        TINYINT UNSIGNED NOT NULL DEFAULT 6,
  `status`      ENUM('Menunggu','Diterima','Ditolak') NOT NULL DEFAULT 'Menunggu',
  `tgl_daftar`  DATE          NOT NULL,
  `catatan`     TEXT          NULL,
  `created_at`  DATETIME      NULL,
  `updated_at`  DATETIME      NULL,
  `deleted_at`  DATETIME      NULL,
  PRIMARY KEY (`id`),
  KEY `idx_status`  (`status`),
  KEY `idx_tgl`     (`tgl_daftar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Data PPDB pendaftaran siswa baru';

-- ══════════════════════════════════════════
-- TABEL: agenda
-- Kalender kegiatan & agenda sekolah
-- ══════════════════════════════════════════
DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `id`         INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `judul`      VARCHAR(255)  NOT NULL,
  `tanggal`    DATE          NOT NULL,
  `waktu`      TIME          NULL,
  `tempat`     VARCHAR(200)  NULL,
  `deskripsi`  TEXT          NULL,
  `kategori`   VARCHAR(50)   NOT NULL DEFAULT 'Lainnya',
  `status`     ENUM('Aktif','Selesai','Batal') NOT NULL DEFAULT 'Aktif',
  `created_at` DATETIME      NULL,
  `updated_at` DATETIME      NULL,
  `deleted_at` DATETIME      NULL,
  PRIMARY KEY (`id`),
  KEY `idx_tanggal` (`tanggal`),
  KEY `idx_status`  (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Agenda dan kalender kegiatan sekolah';

-- ══════════════════════════════════════════
-- TABEL: galeri
-- Foto dan dokumentasi kegiatan
-- ══════════════════════════════════════════
DROP TABLE IF EXISTS `galeri`;
CREATE TABLE `galeri` (
  `id`         INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `nama`       VARCHAR(200)  NOT NULL,
  `kategori`   VARCHAR(50)   NOT NULL DEFAULT 'Kegiatan',
  `emoji`      VARCHAR(10)   NULL DEFAULT '🖼️',
  `file_foto`  VARCHAR(255)  NULL  COMMENT 'Nama file di /public/uploads/',
  `created_at` DATETIME      NULL,
  `updated_at` DATETIME      NULL,
  `deleted_at` DATETIME      NULL,
  PRIMARY KEY (`id`),
  KEY `idx_kategori` (`kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Galeri foto dan dokumentasi';

-- ══════════════════════════════════════════
-- TABEL: guru
-- Data tenaga pendidik dan staf
-- ══════════════════════════════════════════
DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru` (
  `id`         INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `nama`       VARCHAR(150)  NOT NULL,
  `nip`        VARCHAR(20)   NOT NULL,
  `jabatan`    VARCHAR(100)  NULL,
  `mapel`      VARCHAR(100)  NULL  COMMENT 'Mata pelajaran / kelas',
  `status`     ENUM('Aktif','Cuti','Pensiun') NOT NULL DEFAULT 'Aktif',
  `avatar`     VARCHAR(10)   NULL DEFAULT '👨‍🏫',
  `created_at` DATETIME      NULL,
  `updated_at` DATETIME      NULL,
  `deleted_at` DATETIME      NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_nip` (`nip`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Data guru dan tenaga pendidik';

-- ══════════════════════════════════════════
-- SEED DATA: users
-- Password-hash menggunakan PHP password_hash(value, PASSWORD_DEFAULT)
--   admin123  → $2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UyVC
--   sdn56pbm  → $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi
--   operator56→ $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi
-- ══════════════════════════════════════════
INSERT INTO `users` (`nama`, `username`, `password`, `email`, `role`, `avatar`, `created_at`) VALUES
('Administrator',
 'admin',
 '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UyVC',
 'admin@sdn56pbm.sch.id',
 'Super Admin', 'A', NOW()),

('Dra. Hj. Siti Rahayu',
 'kepala',
 '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
 'kepala@sdn56pbm.sch.id',
 'Kepala Sekolah', 'K', NOW()),

('Operator Sekolah',
 'operator',
 '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
 'operator@sdn56pbm.sch.id',
 'Operator', 'O', NOW());

-- ⚠️  PENTING: Setelah import, segera ganti password lewat panel Settings!
-- Untuk generate hash baru jalankan di PHP:
--   echo password_hash('passwordbaru', PASSWORD_DEFAULT);

-- ══════════════════════════════════════════
-- SEED DATA: guru
-- ══════════════════════════════════════════
INSERT INTO `guru` (`nama`, `nip`, `jabatan`, `mapel`, `status`, `avatar`, `created_at`) VALUES
('Dra. Hj. Siti Rahayu',  '196805121992032001', 'Kepala Sekolah',      '-',                    'Aktif',   '👩‍💼', NOW()),
('Budi Santoso, S.Pd',    '197203181998011001', 'Guru Kelas',          'Kelas 6A',             'Aktif',   '👨‍🏫', NOW()),
('Dewi Lestari, S.Pd',    '198504152010012001', 'Guru Mata Pelajaran', 'Matematika',           'Aktif',   '👩‍🏫', NOW()),
('Rina Wati, S.Pd',       '198901202012012001', 'Guru Mata Pelajaran', 'Bahasa Indonesia',     'Aktif',   '👩‍🏫', NOW()),
('Ahmad Fauzi, S.Pd',     '199002282015011001', 'Guru Mata Pelajaran', 'PJOK',                 'Aktif',   '👨‍🏫', NOW()),
('Yuni Astuti, S.Pd',     '199510102018012001', 'Guru Mata Pelajaran', 'IPA',                  'Aktif',   '👩‍🏫', NOW()),
('Hendra Wijaya, S.Pd',   '199201152019011001', 'Guru Mata Pelajaran', 'IPS',                  'Aktif',   '👨‍🏫', NOW()),
('Sri Mulyani, S.Pd',     '198807082014012001', 'Guru Kelas',          'Kelas 1A',             'Aktif',   '👩‍🏫', NOW()),
('Rizky Firmansyah, S.Pd','200001032020011001', 'Guru Mata Pelajaran', 'Seni Budaya & Prakarya','Aktif',  '👨‍🏫', NOW()),
('Nurul Hidayah, S.Pd',   '199308152021012001', 'Staf Tata Usaha',     '-',                    'Aktif',   '👩‍💼', NOW());

-- ══════════════════════════════════════════
-- SEED DATA: berita
-- ══════════════════════════════════════════
INSERT INTO `berita` (`judul`, `slug`, `kategori`, `isi`, `status`, `tanggal`, `views`, `created_at`) VALUES
(
  'Siswa SDN 56 Sabet Medali Emas Olimpiade Sains Kota Prabumulih 2026',
  'siswa-sdn56-raih-medali-emas-olimpiade-sains-2026',
  'Prestasi',
  'Prabumulih — Dua siswa terbaik SD Negeri 56 Prabumulih berhasil menorehkan prestasi gemilang dengan meraih medali emas dalam Olimpiade Sains Nasional (OSN) tingkat Kota Prabumulih Tahun 2026.

Keduanya berhasil unggul dalam bidang Matematika dan Ilmu Pengetahuan Alam (IPA) setelah melalui serangkaian seleksi ketat di tingkat sekolah dan kecamatan.

Kepala Sekolah SDN 56, Dra. Hj. Siti Rahayu, menyampaikan rasa bangga dan apresiasinya kepada para siswa berprestasi tersebut. "Ini merupakan buah dari kerja keras siswa, bimbingan guru, dan dukungan penuh dari orang tua. Kami berharap pencapaian ini dapat menginspirasi siswa-siswa lain untuk terus berprestasi," ujarnya.

Para pemenang akan mendapatkan penghargaan dan pembinaan lebih lanjut untuk mengikuti seleksi di tingkat provinsi.',
  'Terbit', '2026-02-24', 1240, NOW()
),
(
  'SDN 56 Prabumulih Gelar Wisuda dan Pelepasan Kelas 6 TA 2025/2026',
  'wisuda-pelepasan-kelas-6-ta-2025-2026',
  'Kegiatan',
  'SDN 56 Prabumulih melaksanakan prosesi wisuda dan pelepasan siswa kelas 6 Tahun Ajaran 2025/2026 dengan khidmat di aula sekolah, dihadiri oleh seluruh orang tua, guru, dan tamu undangan.

Acara yang berlangsung penuh haru ini menampilkan persembahan seni dari siswa kelas 1 hingga 5, sambutan dari Kepala Sekolah, serta pembagian penghargaan kepada siswa-siswa berprestasi.

Sebanyak 92 siswa kelas 6 resmi dinyatakan lulus dengan tingkat kelulusan 100 persen. Tiga siswa terbaik mendapat penghargaan khusus atas prestasi akademik tertinggi selama enam tahun belajar.',
  'Terbit', '2026-02-20', 840, NOW()
),
(
  'SDN 56 Prabumulih Raih Penghargaan Adiwiyata Tingkat Provinsi Sumsel',
  'sdn56-raih-penghargaan-adiwiyata-provinsi-sumsel',
  'Lingkungan',
  'SD Negeri 56 Prabumulih berhasil meraih penghargaan bergengsi Adiwiyata tingkat Provinsi Sumatera Selatan atas komitmennya dalam menerapkan program pendidikan lingkungan hidup secara konsisten.

Program Adiwiyata di SDN 56 mencakup pengelolaan sampah terpadu dengan sistem pilah sampah 3R (Reduce, Reuse, Recycle), kebun sekolah dengan berbagai tanaman toga dan sayuran organik, serta program penghijauan lingkungan sekolah yang melibatkan seluruh warga sekolah.

Penghargaan ini diserahkan langsung oleh Gubernur Sumatera Selatan dalam acara Hari Lingkungan Hidup Sedunia di Palembang.',
  'Terbit', '2026-02-15', 620, NOW()
),
(
  'Implementasi Kurikulum Merdeka: Gelar Pameran Proyek P5 Perdana',
  'implementasi-kurikulum-merdeka-pameran-proyek-p5',
  'Akademik',
  'Dalam rangka implementasi Kurikulum Merdeka, SDN 56 Prabumulih menggelar Pameran Projek Penguatan Profil Pelajar Pancasila (P5) perdana dengan tema "Bhinneka Tunggal Ika: Merayakan Keberagaman Nusantara".

Pameran yang berlangsung selama dua hari ini menampilkan berbagai karya siswa mulai dari miniatur rumah adat, pakaian daerah, kuliner tradisional, hingga pertunjukan seni budaya dari berbagai penjuru Indonesia.

Seluruh siswa dari kelas 1 hingga kelas 6 turut berpartisipasi aktif dalam pameran ini, didampingi oleh guru pembimbing masing-masing.',
  'Terbit', '2026-02-10', 475, NOW()
),
(
  'Penerimaan PPDB 2026/2027 Segera Dibuka, Berikut Informasinya',
  'informasi-ppdb-2026-2027-sdn56-prabumulih',
  'Kegiatan',
  'SD Negeri 56 Prabumulih akan segera membuka Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2026/2027 mulai 1 April 2026.

Calon siswa baru yang ingin mendaftarkan putra-putrinya dapat mendaftar secara online melalui website resmi sekolah maupun langsung datang ke kantor sekolah.

Persyaratan utama: usia minimal 6 tahun per 1 Juli 2026, memiliki akta kelahiran dan kartu keluarga. Tersedia 4 rombongan belajar dengan kapasitas total 112 siswa. Informasi lengkap dapat menghubungi kantor TU sekolah.',
  'Terbit', '2026-02-05', 920, NOW()
),
(
  'Tim Futsal SDN 56 Juara 2 Turnamen Piala Walikota Prabumulih 2026',
  'tim-futsal-sdn56-juara-2-piala-walikota-2026',
  'Olahraga',
  'Tim futsal SD Negeri 56 Prabumulih berhasil meraih juara 2 dalam Turnamen Futsal Piala Walikota Prabumulih 2026 yang diikuti oleh 32 sekolah dasar se-Kota Prabumulih.

Perjalanan tim yang dilatih oleh Ahmad Fauzi, S.Pd ini sangat membanggakan dengan meraih kemenangan di setiap babak penyisihan sebelum akhirnya bertemu tim tangguh dari SDN 12 Prabumulih di final.

Pelatih dan seluruh pemain mendapat sambutan meriah setibanya di sekolah, disambut oleh kepala sekolah, dewan guru, dan seluruh siswa yang berbaris di depan gerbang sekolah.',
  'Terbit', '2026-01-28', 380, NOW()
);

-- ══════════════════════════════════════════
-- SEED DATA: agenda
-- ══════════════════════════════════════════
INSERT INTO `agenda` (`judul`, `tanggal`, `waktu`, `tempat`, `deskripsi`, `kategori`, `status`, `created_at`) VALUES
('Rapat Komite Sekolah Semester Genap',
 '2026-02-28', '08:00', 'Aula SDN 56 Prabumulih',
 'Rapat komite membahas program sekolah semester genap dan persiapan PPDB 2026/2027.',
 'Rapat', 'Aktif', NOW()),

('Pembagian Rapor Semester Ganjil',
 '2026-03-05', '07:30', 'Ruang Kelas Masing-Masing',
 'Pembagian rapor semester ganjil tahun ajaran 2025/2026 kepada orang tua/wali siswa.',
 'Akademik', 'Aktif', NOW()),

('Ujian Akhir Semester (UAS) Genap 2025/2026',
 '2026-03-10', '07:00', 'Semua Ruang Kelas',
 'Pelaksanaan UAS genap untuk seluruh kelas 1 sampai kelas 6, berlangsung selama 6 hari.',
 'Akademik', 'Aktif', NOW()),

('Pembukaan Resmi PPDB 2026/2027',
 '2026-04-01', '08:00', 'Kantor Tata Usaha & Online',
 'Pembukaan pendaftaran PPDB Tahun Ajaran 2026/2027 secara online dan offline.',
 'PPDB', 'Aktif', NOW()),

('Peringatan Hari Pendidikan Nasional',
 '2026-05-02', '07:00', 'Lapangan Upacara SDN 56',
 'Upacara bendera dalam rangka memperingati Hari Pendidikan Nasional ke-67.',
 'Upacara', 'Aktif', NOW()),

('Penutupan PPDB 2026/2027',
 '2026-05-31', '14:00', 'Kantor Tata Usaha',
 'Batas akhir pendaftaran PPDB Tahun Ajaran 2026/2027.',
 'PPDB', 'Aktif', NOW()),

('Pengumuman Penerimaan PPDB',
 '2026-06-07', '09:00', 'Website & Papan Pengumuman',
 'Pengumuman resmi hasil seleksi PPDB 2026/2027.',
 'PPDB', 'Aktif', NOW()),

('Daftar Ulang Siswa Baru',
 '2026-06-10', '08:00', 'Kantor Tata Usaha',
 'Daftar ulang dan kelengkapan administrasi siswa baru yang diterima.',
 'PPDB', 'Aktif', NOW()),

('Masa Orientasi Siswa (MOS) Baru',
 '2026-07-13', '07:00', 'Seluruh Lingkungan Sekolah',
 'Pengenalan lingkungan sekolah bagi siswa baru kelas 1 tahun ajaran 2026/2027.',
 'Akademik', 'Aktif', NOW()),

('Hari Pertama Sekolah TA 2026/2027',
 '2026-07-13', '07:00', 'Seluruh Ruang Kelas',
 'Awal tahun ajaran baru 2026/2027 untuk seluruh siswa SDN 56 Prabumulih.',
 'Akademik', 'Aktif', NOW());

-- ══════════════════════════════════════════
-- SEED DATA: galeri
-- ══════════════════════════════════════════
INSERT INTO `galeri` (`nama`, `kategori`, `emoji`, `created_at`) VALUES
('Gedung Utama SDN 56 Prabumulih',    'Fasilitas',   '🏫', NOW()),
('Olimpiade Sains Kota 2026',         'Prestasi',    '🏆', NOW()),
('Pentas Seni Tahunan 2025',          'Kegiatan',    '🎭', NOW()),
('Turnamen Futsal Antar Kelas',       'Olahraga',    '⚽', NOW()),
('Program Adiwiyata - Kebun Sekolah', 'Lingkungan',  '🌱', NOW()),
('Wisuda & Pelepasan Kelas 6 2025',   'Kegiatan',    '🎓', NOW()),
('Perpustakaan Digital Sekolah',      'Fasilitas',   '📚', NOW()),
('Upacara Bendera Senin',             'Kegiatan',    '🎌', NOW()),
('Laboratorium Komputer',             'Fasilitas',   '💻', NOW()),
('Pameran Proyek P5',                 'Kegiatan',    '🎨', NOW()),
('Juara Futsal Piala Walikota',       'Olahraga',    '🥈', NOW()),
('Kerja Bakti Lingkungan Sekolah',    'Lingkungan',  '🌿', NOW());

-- ══════════════════════════════════════════
-- SEED DATA: ppdb (contoh data pendaftar)
-- ══════════════════════════════════════════
INSERT INTO `ppdb` (`nama`, `tempat_lahir`, `tgl_lahir`, `nama_ortu`, `telepon`, `email`, `asal`, `usia`, `status`, `tgl_daftar`, `created_at`) VALUES
('Muhammad Rafif Al-Farizi',  'Prabumulih', '2020-04-12', 'Bapak Andri Setiawan',  '081234567890', 'andri@gmail.com',   'TK Pertiwi 1',    6, 'Menunggu', '2026-04-03', NOW()),
('Nayla Putri Rahayu',        'Prabumulih', '2020-07-22', 'Ibu Sari Dewi',         '081345678901', 'sari@gmail.com',    'TK Al-Hidayah',   6, 'Diterima', '2026-04-04', NOW()),
('Arkan Dwi Pratama',         'Muara Enim', '2019-11-05', 'Bapak Dedi Kurniawan',  '081456789012', 'dedi@yahoo.com',    'TK Budi Luhur',   6, 'Menunggu', '2026-04-05', NOW()),
('Zahira Aulia Putri',        'Prabumulih', '2020-02-18', 'Ibu Rina Marlina',      '081567890123', 'rina@gmail.com',    'TK Kemala Bhayangkari', 6, 'Diterima', '2026-04-06', NOW()),
('Farhan Rizky Maulana',      'Prabumulih', '2019-08-30', 'Bapak Hendra Permana',  '081678901234', 'hendra@gmail.com',  '-',               7, 'Ditolak',  '2026-04-07', NOW());

SET FOREIGN_KEY_CHECKS = 1;

-- ╔══════════════════════════════════════╗
-- ║  SELESAI — Total tabel: 6            ║
-- ║  berita | ppdb | agenda | galeri     ║
-- ║  guru   | users                     ║
-- ╚══════════════════════════════════════╝
