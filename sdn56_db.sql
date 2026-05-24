-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: sdn56_db
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `sdn56_db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `sdn56_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `sdn56_db`;

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agenda` (
  `id_agenda` int unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL,
  `tempat` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  `kategori` varchar(50) NOT NULL DEFAULT 'Lainnya',
  `status` enum('Aktif','Selesai','Batal') NOT NULL DEFAULT 'Aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_agenda`),
  KEY `idx_tanggal` (`tanggal`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Agenda dan kalender kegiatan sekolah';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (1,'Rapat Komite Sekolah Semester Genap','2026-02-28','08:00:00','Aula SDN 56 Prabumulih','Rapat komite membahas program sekolah semester genap dan persiapan PPDB 2026/2027.','Rapat','Aktif','2026-05-16 21:59:26',NULL,NULL),(2,'Pembagian Rapor Semester Ganjil','2026-03-05','07:30:00','Ruang Kelas Masing-Masing','Pembagian rapor semester ganjil tahun ajaran 2025/2026 kepada orang tua/wali siswa.','Akademik','Aktif','2026-05-16 21:59:26',NULL,NULL),(3,'Ujian Akhir Semester (UAS) Genap 2025/2026','2026-03-10','07:00:00','Semua Ruang Kelas','Pelaksanaan UAS genap untuk seluruh kelas 1 sampai kelas 6, berlangsung selama 6 hari.','Akademik','Aktif','2026-05-16 21:59:26',NULL,NULL),(4,'Pembukaan Resmi PPDB 2026/2027','2026-04-01','08:00:00','Kantor Tata Usaha & Online','Pembukaan pendaftaran PPDB Tahun Ajaran 2026/2027 secara online dan offline.','PPDB','Aktif','2026-05-16 21:59:26',NULL,NULL),(5,'Peringatan Hari Pendidikan Nasional','2026-05-02','07:00:00','Lapangan Upacara SDN 56','Upacara bendera dalam rangka memperingati Hari Pendidikan Nasional ke-67.','Upacara','Aktif','2026-05-16 21:59:26',NULL,NULL),(6,'Penutupan PPDB 2026/2027','2026-05-31','14:00:00','Kantor Tata Usaha','Batas akhir pendaftaran PPDB Tahun Ajaran 2026/2027.','PPDB','Aktif','2026-05-16 21:59:26',NULL,NULL),(7,'Pengumuman Penerimaan PPDB','2026-06-07','09:00:00','Website & Papan Pengumuman','Pengumuman resmi hasil seleksi PPDB 2026/2027.','PPDB','Aktif','2026-05-16 21:59:26',NULL,NULL),(8,'Daftar Ulang Siswa Baru','2026-06-10','08:00:00','Kantor Tata Usaha','Daftar ulang dan kelengkapan administrasi siswa baru yang diterima.','PPDB','Aktif','2026-05-16 21:59:26',NULL,NULL),(9,'Masa Orientasi Siswa (MOS) Baru','2026-07-13','07:00:00','Seluruh Lingkungan Sekolah','Pengenalan lingkungan sekolah bagi siswa baru kelas 1 tahun ajaran 2026/2027.','Akademik','Aktif','2026-05-16 21:59:26',NULL,NULL),(10,'Hari Pertama Sekolah TA 2026/2027','2026-07-13','07:00:00','Seluruh Ruang Kelas','Awal tahun ajaran baru 2026/2027 untuk seluruh siswa SDN 56 Prabumulih.','Akademik','Aktif','2026-05-16 21:59:26',NULL,NULL),(11,'Upacara Kemerdekan Nasional','2026-05-24','09:00:00','Lapangan SD 56 Prabumulih',NULL,'Upacara','Aktif','2026-05-19 15:22:18','2026-05-19 15:29:48','2026-05-19 15:29:48');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berita` (
  `id_berita` int unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kategori` varchar(50) NOT NULL DEFAULT 'Kegiatan',
  `isi` longtext,
  `thumbnail` varchar(255) DEFAULT NULL,
  `status` enum('Terbit','Draf') NOT NULL DEFAULT 'Draf',
  `tanggal` date NOT NULL,
  `views` int unsigned NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_berita`),
  UNIQUE KEY `uq_slug` (`slug`),
  KEY `idx_status` (`status`),
  KEY `idx_kategori` (`kategori`),
  KEY `idx_tanggal` (`tanggal`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Berita dan artikel sekolah';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` VALUES (1,'Siswa SDN 56 Sabet Medali Emas Olimpiade Sains Kota Prabumulih 2026','siswa-sdn56-raih-medali-emas-olimpiade-sains-2026','Prestasi','Prabumulih â€” Dua siswa terbaik SD Negeri 56 Prabumulih berhasil menorehkan prestasi gemilang dengan meraih medali emas dalam Olimpiade Sains Nasional (OSN) tingkat Kota Prabumulih Tahun 2026.\n\nKeduanya berhasil unggul dalam bidang Matematika dan Ilmu Pengetahuan Alam (IPA) setelah melalui serangkaian seleksi ketat di tingkat sekolah dan kecamatan.\n\nKepala Sekolah SDN 56, Dra. Hj. Siti Rahayu, menyampaikan rasa bangga dan apresiasinya kepada para siswa berprestasi tersebut. \"Ini merupakan buah dari kerja keras siswa, bimbingan guru, dan dukungan penuh dari orang tua. Kami berharap pencapaian ini dapat menginspirasi siswa-siswa lain untuk terus berprestasi,\" ujarnya.\n\nPara pemenang akan mendapatkan penghargaan dan pembinaan lebih lanjut untuk mengikuti seleksi di tingkat provinsi.',NULL,'Terbit','2026-02-24',1240,'2026-05-16 21:59:26',NULL,NULL),(2,'SDN 56 Prabumulih Gelar Wisuda dan Pelepasan Kelas 6 TA 2025/2026','wisuda-pelepasan-kelas-6-ta-2025-2026','Kegiatan','SDN 56 Prabumulih melaksanakan prosesi wisuda dan pelepasan siswa kelas 6 Tahun Ajaran 2025/2026 dengan khidmat di aula sekolah, dihadiri oleh seluruh orang tua, guru, dan tamu undangan.\n\nAcara yang berlangsung penuh haru ini menampilkan persembahan seni dari siswa kelas 1 hingga 5, sambutan dari Kepala Sekolah, serta pembagian penghargaan kepada siswa-siswa berprestasi.\n\nSebanyak 92 siswa kelas 6 resmi dinyatakan lulus dengan tingkat kelulusan 100 persen. Tiga siswa terbaik mendapat penghargaan khusus atas prestasi akademik tertinggi selama enam tahun belajar.',NULL,'Terbit','2026-02-20',840,'2026-05-16 21:59:26',NULL,NULL),(3,'SDN 56 Prabumulih Raih Penghargaan Adiwiyata Tingkat Provinsi Sumsel','sdn56-raih-penghargaan-adiwiyata-provinsi-sumsel','Lingkungan','SD Negeri 56 Prabumulih berhasil meraih penghargaan bergengsi Adiwiyata tingkat Provinsi Sumatera Selatan atas komitmennya dalam menerapkan program pendidikan lingkungan hidup secara konsisten.\n\nProgram Adiwiyata di SDN 56 mencakup pengelolaan sampah terpadu dengan sistem pilah sampah 3R (Reduce, Reuse, Recycle), kebun sekolah dengan berbagai tanaman toga dan sayuran organik, serta program penghijauan lingkungan sekolah yang melibatkan seluruh warga sekolah.\n\nPenghargaan ini diserahkan langsung oleh Gubernur Sumatera Selatan dalam acara Hari Lingkungan Hidup Sedunia di Palembang.',NULL,'Terbit','2026-02-15',620,'2026-05-16 21:59:26',NULL,NULL),(4,'Implementasi Kurikulum Merdeka: Gelar Pameran Proyek P5 Perdana','implementasi-kurikulum-merdeka-pameran-proyek-p5','Akademik','Dalam rangka implementasi Kurikulum Merdeka, SDN 56 Prabumulih menggelar Pameran Projek Penguatan Profil Pelajar Pancasila (P5) perdana dengan tema \"Bhinneka Tunggal Ika: Merayakan Keberagaman Nusantara\".\n\nPameran yang berlangsung selama dua hari ini menampilkan berbagai karya siswa mulai dari miniatur rumah adat, pakaian daerah, kuliner tradisional, hingga pertunjukan seni budaya dari berbagai penjuru Indonesia.\n\nSeluruh siswa dari kelas 1 hingga kelas 6 turut berpartisipasi aktif dalam pameran ini, didampingi oleh guru pembimbing masing-masing.',NULL,'Terbit','2026-02-10',475,'2026-05-16 21:59:26',NULL,NULL),(5,'Penerimaan PPDB 2026/2027 Segera Dibuka, Berikut Informasinya','informasi-ppdb-2026-2027-sdn56-prabumulih','Kegiatan','SD Negeri 56 Prabumulih akan segera membuka Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2026/2027 mulai 1 April 2026.\n\nCalon siswa baru yang ingin mendaftarkan putra-putrinya dapat mendaftar secara online melalui website resmi sekolah maupun langsung datang ke kantor sekolah.\n\nPersyaratan utama: usia minimal 6 tahun per 1 Juli 2026, memiliki akta kelahiran dan kartu keluarga. Tersedia 4 rombongan belajar dengan kapasitas total 112 siswa. Informasi lengkap dapat menghubungi kantor TU sekolah.',NULL,'Terbit','2026-02-05',920,'2026-05-16 21:59:26',NULL,NULL),(6,'Tim Futsal SDN 56 Juara 2 Turnamen Piala Walikota Prabumulih 2026','tim-futsal-sdn56-juara-2-piala-walikota-2026','Olahraga','Tim futsal SD Negeri 56 Prabumulih berhasil meraih juara 2 dalam Turnamen Futsal Piala Walikota Prabumulih 2026 yang diikuti oleh 32 sekolah dasar se-Kota Prabumulih.\n\nPerjalanan tim yang dilatih oleh Ahmad Fauzi, S.Pd ini sangat membanggakan dengan meraih kemenangan di setiap babak penyisihan sebelum akhirnya bertemu tim tangguh dari SDN 12 Prabumulih di final.\n\nPelatih dan seluruh pemain mendapat sambutan meriah setibanya di sekolah, disambut oleh kepala sekolah, dewan guru, dan seluruh siswa yang berbaris di depan gerbang sekolah.',NULL,'Terbit','2026-01-28',380,'2026-05-16 21:59:26',NULL,NULL),(7,'ANJAY','anjay','Lingkungan','testing','1779164977_bf0d24eece8fbf502ab9.mp4','Terbit','2026-05-19',1,'2026-05-19 04:29:37','2026-05-19 04:37:30',NULL),(8,'kita edit dulu ','kita-edit-dulu','Kegiatan','testing dulu','1779202980_ff6ef85478ba32196233.mp4','Terbit','2026-05-19',0,'2026-05-19 15:03:00','2026-05-19 15:07:31','2026-05-19 15:07:31');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeri` (
  `id_galeri` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `kategori` varchar(50) NOT NULL DEFAULT 'Kegiatan',
  `emoji` varchar(10) DEFAULT 0xF09F96BCEFB88F,
  `file_foto` varchar(255) DEFAULT NULL COMMENT 'Nama file di /public/uploads/',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_galeri`),
  KEY `idx_kategori` (`kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Galeri foto dan dokumentasi';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` VALUES (1,'Gedung Utama SDN 56 Prabumulih','Fasilitas','ðŸ«',NULL,'2026-05-16 21:59:26',NULL,NULL),(2,'Olimpiade Sains Kota 2026','Prestasi','ðŸ†',NULL,'2026-05-16 21:59:26',NULL,NULL),(3,'Pentas Seni Tahunan 2025','Kegiatan','ðŸŽ­',NULL,'2026-05-16 21:59:26',NULL,NULL),(4,'Turnamen Futsal Antar Kelas','Olahraga','âš½',NULL,'2026-05-16 21:59:26',NULL,NULL),(5,'Program Adiwiyata - Kebun Sekolah','Lingkungan','ðŸŒ±',NULL,'2026-05-16 21:59:26',NULL,NULL),(6,'Wisuda & Pelepasan Kelas 6 2025','Kegiatan','ðŸŽ“',NULL,'2026-05-16 21:59:26',NULL,NULL),(7,'Perpustakaan Digital Sekolah','Fasilitas','ðŸ“š',NULL,'2026-05-16 21:59:26',NULL,NULL),(8,'Upacara Bendera Senin','Kegiatan','ðŸŽŒ',NULL,'2026-05-16 21:59:26',NULL,NULL),(9,'Laboratorium Komputer','Fasilitas','ðŸ’»',NULL,'2026-05-16 21:59:26',NULL,NULL),(10,'Pameran Proyek P5','Kegiatan','ðŸŽ¨',NULL,'2026-05-16 21:59:26',NULL,NULL),(11,'Juara Futsal Piala Walikota','Olahraga','ðŸ¥ˆ',NULL,'2026-05-16 21:59:26',NULL,NULL),(12,'Kerja Bakti Lingkungan Sekolah','Lingkungan','ðŸŒ¿',NULL,'2026-05-16 21:59:26',NULL,NULL),(13,'test33','Lingkungan','ðŸ–¼ï¸','1779208221_8c90eda922d542f9bb03.jpg','2026-05-19 04:35:56','2026-05-19 16:30:21',NULL),(14,'testing','Fasilitas','ðŸ–¼ï¸','1779204976_2384cb790ceb71621f69.jpg','2026-05-19 15:36:16','2026-05-19 15:37:06','2026-05-19 15:37:06'),(15,'gagaga','Kegiatan','ðŸ–¼ï¸','1779347529_55bdced97718669c8fb0.jpg','2026-05-21 07:12:09','2026-05-21 07:12:09',NULL);
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guru` (
  `id_guru` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `mapel` varchar(100) DEFAULT NULL COMMENT 'Mata pelajaran / kelas',
  `status` enum('Aktif','Cuti','Pensiun') NOT NULL DEFAULT 'Aktif',
  `avatar` varchar(10) DEFAULT 0xF09F91A8E2808DF09F8FAB,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_guru`),
  UNIQUE KEY `uq_nip` (`nip`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Data guru dan tenaga pendidik';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru`
--

LOCK TABLES `guru` WRITE;
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` VALUES (1,'Dra. Hj. Siti Rahayu','196805121992032001','Kepala Sekolah','-','Aktif','ðŸ‘©â€ðŸ’¼','2026-05-16 21:59:26',NULL,NULL),(2,'Ahman Supriadi Putra, S.Pd','197203181998011001','Guru Kelas','Kelas 6A','Aktif','ðŸ‘¨â€ðŸ«','2026-05-16 21:59:26','2026-05-19 17:04:24',NULL),(3,'Dewi Lestari, S.Pd','198504152010012001','Guru Mata Pelajaran','Matematika','Aktif','ðŸ‘©â€ðŸ«','2026-05-16 21:59:26',NULL,NULL),(4,'Rina Wati, S.Pd','198901202012012001','Guru Mata Pelajaran','Bahasa Indonesia','Aktif','ðŸ‘©â€ðŸ«','2026-05-16 21:59:26',NULL,NULL),(5,'Ahmad Fauzi, S.Pd','199002282015011001','Guru Mata Pelajaran','PJOK','Aktif','ðŸ‘¨â€ðŸ«','2026-05-16 21:59:26',NULL,NULL),(6,'Yuni Astuti, S.Pd','199510102018012001','Guru Mata Pelajaran','IPA','Aktif','ðŸ‘©â€ðŸ«','2026-05-16 21:59:26',NULL,NULL),(7,'Hendra Wijaya, S.Pd','199201152019011001','Guru Mata Pelajaran','IPS','Aktif','ðŸ‘¨â€ðŸ«','2026-05-16 21:59:26',NULL,NULL),(8,'Sri Mulyani, S.Pd','198807082014012001','Guru Kelas','Kelas 1A','Aktif','ðŸ‘©â€ðŸ«','2026-05-16 21:59:26',NULL,NULL),(9,'Rizky Firmansyah, S.Pd','200001032020011001','Guru Mata Pelajaran','Seni Budaya & Prakarya','Aktif','ðŸ‘¨â€ðŸ«','2026-05-16 21:59:26',NULL,NULL),(10,'Nurul Hidayah, S.Pd','199308152021012001','Staf Tata Usaha','-','Aktif','ðŸ‘©â€ðŸ’¼','2026-05-16 21:59:26',NULL,NULL),(11,'Ahmad Supriadi Putra, S.Pd','123456789101112345','Guru Matematika','Matematika','Aktif','ðŸ‘¨â€ðŸ«','2026-05-19 15:40:58','2026-05-19 15:43:59','2026-05-19 15:43:59'),(12,'Ahmad Supriadi, S.Pd','123456789101112367','Guru Matematika','Matematika','Aktif','ðŸ‘¨â€ðŸ«','2026-05-19 15:47:39','2026-05-19 15:47:39',NULL);
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2024_01_01_000000','App\\Database\\Migrations\\AddResetPasswordToUsers','default','App',1778971954,1),(2,'2026_05_17_000001','App\\Database\\Migrations\\CreatePpdbLaporanTahunanTable','default','App',1778971954,1),(3,'2026-05-17-120000','App\\Database\\Migrations\\CreatePpdbJadwal','default','App',1779009845,2),(4,'2026-05-17-120100','App\\Database\\Migrations\\CreatePpdbDokumen','default','App',1779009845,2),(5,'2026-05-17-120200','App\\Database\\Migrations\\CreatePpdbConfig','default','App',1779009918,3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppdb`
--

DROP TABLE IF EXISTS `ppdb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ppdb` (
  `id_ppdb` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `nik_siswa` varchar(20) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT 'WNI',
  `status_kesehatan` text,
  `nama_ortu` varchar(150) DEFAULT NULL,
  `nik_ortu` varchar(20) DEFAULT NULL,
  `pekerjaan_ortu` varchar(100) DEFAULT NULL,
  `agama_ortu` varchar(30) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text,
  `kode_pos` varchar(10) DEFAULT NULL,
  `hubungan` enum('Ayah','Ibu','Wali') DEFAULT NULL,
  `asal` varchar(150) DEFAULT NULL COMMENT 'Asal TK/PAUD',
  `jalur_pendaftaran` enum('Afirmasi','Mutasi Kerja Orang Tua','Domisili') DEFAULT NULL,
  `usia` tinyint unsigned NOT NULL DEFAULT '6',
  `status` enum('Menunggu','Diterima','Ditolak') NOT NULL DEFAULT 'Menunggu',
  `tgl_daftar` date NOT NULL,
  `catatan` text,
  `file_akta` varchar(255) DEFAULT NULL,
  `file_kk` varchar(255) DEFAULT NULL,
  `file_ktp_ortu` varchar(255) DEFAULT NULL,
  `file_foto_siswa` varchar(255) DEFAULT NULL,
  `file_imunisasi` varchar(255) DEFAULT NULL,
  `file_surat_sehat` varchar(255) DEFAULT NULL,
  `file_ijazah_tk` varchar(255) DEFAULT NULL,
  `file_pernyataan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ppdb`),
  KEY `idx_status` (`status`),
  KEY `idx_tgl` (`tgl_daftar`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Data PPDB pendaftaran siswa baru';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppdb`
--

LOCK TABLES `ppdb` WRITE;
/*!40000 ALTER TABLE `ppdb` DISABLE KEYS */;
INSERT INTO `ppdb` VALUES (1,'Muhammad Rafif Al-Farizi',NULL,NULL,NULL,NULL,'Prabumulih','2020-04-12','WNI',NULL,'Bapak Andri Setiawan',NULL,NULL,NULL,'081234567890','andri@gmail.com',NULL,NULL,NULL,'TK Pertiwi 1','Domisili',6,'Menunggu','2026-04-03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-16 21:59:26','2026-05-20 04:50:24','2026-05-20 04:50:24'),(2,'Nayla Putri Rahayu',NULL,NULL,NULL,NULL,'Prabumulih','2020-07-22','WNI',NULL,'Ibu Sari Dewi',NULL,NULL,NULL,'081345678901','sari@gmail.com',NULL,NULL,NULL,'TK Al-Hidayah','Afirmasi',6,'Diterima','2026-04-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-16 21:59:26','2026-05-19 18:46:30','2026-05-19 18:46:30'),(3,'Arkan Dwi Pratama',NULL,NULL,NULL,NULL,'Muara Enim','2019-11-05','WNI',NULL,'Bapak Dedi Kurniawan',NULL,NULL,NULL,'081456789012','dedi@yahoo.com',NULL,NULL,NULL,'TK Budi Luhur','Domisili',6,'Menunggu','2026-04-05',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-16 21:59:26','2026-05-20 04:50:21','2026-05-20 04:50:21'),(4,'Zahira Aulia Putri',NULL,NULL,NULL,NULL,'Prabumulih','2020-02-18','WNI',NULL,'Ibu Rina Marlina',NULL,NULL,NULL,'081567890123','rina@gmail.com',NULL,NULL,NULL,'TK Kemala Bhayangkari','Domisili',6,'Diterima','2026-04-06',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-16 21:59:26','2026-05-19 18:46:33','2026-05-19 18:46:33'),(5,'Farhan Rizky Maulana',NULL,NULL,NULL,NULL,'Prabumulih','2019-08-30','WNI',NULL,'Bapak Hendra Permana',NULL,NULL,NULL,'081678901234','hendra@gmail.com',NULL,NULL,NULL,'-','Mutasi Kerja Orang Tua',7,'Ditolak','2026-04-07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-16 21:59:26','2026-05-19 18:46:48','2026-05-19 18:46:48'),(6,'Iyann','1273894691142143','6583297521060213','Laki-laki','Islam','Jakarta','2020-06-17','WNI','','azis gagap','2154981648016077','CEO','Hindu','085273082764','kusumaraven@gmail.com','Jl. Baru Sukajadi','31111','Ayah','-','Mutasi Kerja Orang Tua',6,'Menunggu','2026-05-17',NULL,'1779010906_0ce4cccc0a943a4c8f43.jpg','1779010906_007fb100c09bb5ee1f4d.jpg','1779010906_31a05104d6387a612f26.jpg','1779010906_a0cc64ad1aba334ccc11.jpg','1779010906_79fa7b24f2df6d749820.jpg','1779010906_28897dd8d255feb9ff39.jpg',NULL,'1779010906_c10c76cb1cef1b6d0fd2.jpg','2026-05-17 09:41:46','2026-05-20 04:50:16','2026-05-20 04:50:16'),(7,'Iyann','1273894691142142','6583297521060224','Laki-laki','Islam','Jakarta','2020-02-09','WNI','','Sal priadi','2154981648016829','','Islam','0896378619020','wjaya061@gmail.com','Jl. Baru Sukajadi','31111','Ayah','-','Mutasi Kerja Orang Tua',5,'Menunggu','2026-05-17',NULL,'1779012520_f16f92107c07d668b884.jpg','1779012520_45188ea74f7cc15bbc27.jpg','1779012520_f3b3fdb4d5f179b54670.jpg','1779012520_e843827738c7463ab239.jpg','1779012520_87ecbd70387cc0814693.jpg','1779012520_847d8b9486276121b463.jpg',NULL,'1779012520_c431578aa14c1c56adc9.jpg','2026-05-17 10:08:40','2026-05-20 04:50:19','2026-05-20 04:50:19'),(8,'Qanita Elkhaira','1273894691142143','6583297521063728','Perempuan','Islam','Padang','2020-07-20','WNI','','Saripudin','2154981648016897','CEO','Islam','085273829385','qanita@gmail.com','Jl. Baru Sukajadi','31111','Ayah','-','Afirmasi',5,'Menunggu','2026-05-19','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-19 17:02:14','2026-05-20 04:50:13','2026-05-20 04:50:13'),(9,'Cahyani','0051207123405082','','Perempuan','Islam','Padang','2020-06-20','WNI','','Saripudin','2154981648016897','CEO','Islam','085273829385','cahyani@gmail.com','Jl. Baru Sukajadi','31111','Ayah','-','Afirmasi',6,'Ditolak','2026-05-20','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-20 04:54:31','2026-05-20 05:56:46',NULL),(10,'Cahyani','0051207123405082','','Perempuan','Islam','Padang','2020-04-20','WNI','','Saripudin','2154981648016897','CEO','Islam','085273829385','cahyani123@gmail.com','Jl. Baru Sukajadi','31111','Ayah','-','Afirmasi',0,'Diterima','2026-05-20',NULL,'1779254164_5bb6fb794deb0409bccf.jpg','1779254164_3deb5b9ec6244ae40527.jpg','1779254164_eb11c2c7e156aae12ab1.jpg','1779254164_40e5762417adfd254f6b.jpg','1779254164_329e0b92f5ca4fb7ccc9.jpg','1779254164_97001b6889f77c6f8166.jpg',NULL,'1779254164_fd180ed2614339a4f92e.jpg','2026-05-20 05:16:04','2026-05-20 05:58:06',NULL),(11,'Jason Ranti','1273894691142143','','Laki-laki','Kristen','Jakarta','2020-04-20','WNI','','Azis gagap','2154981648016077','CEO','Kristen','085273082764','jason@gmail.com','Jl. Baru Sukajadi','31111','Ayah','-','Afirmasi',6,'Diterima','2026-05-20',NULL,'1779256904_7e55760270ee81f0155d.jpg','1779256904_f4c6b01e4fae8dbf44c3.jpg','1779256904_1fb97c07fe4245506b28.jpg','1779256904_e4a40a40a0c337a13001.jpg','1779256904_793ee4548b1e77a5804a.jpg','1779256904_9b3a08018df1f48970ba.jpg',NULL,'1779256904_a7945447f36c898e8cce.jpg','2026-05-20 06:01:44','2026-05-20 06:02:17',NULL);
/*!40000 ALTER TABLE `ppdb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppdb_config`
--

DROP TABLE IF EXISTS `ppdb_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ppdb_config` (
  `id_ppdb_config` int unsigned NOT NULL AUTO_INCREMENT,
  `kunci` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nilai` text COLLATE utf8mb4_general_ci,
  `tipe` enum('string','integer','date','boolean') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'string',
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ppdb_config`),
  UNIQUE KEY `kunci` (`kunci`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppdb_config`
--

LOCK TABLES `ppdb_config` WRITE;
/*!40000 ALTER TABLE `ppdb_config` DISABLE KEYS */;
INSERT INTO `ppdb_config` VALUES (1,'tgl_buka','1 April 2026','string','Tanggal pembukaan pendaftaran PPDB','2026-05-17 09:25:18','2026-05-17 09:25:18'),(2,'tgl_tutup','31 Mei 2026','string','Tanggal penutupan pendaftaran PPDB','2026-05-17 09:25:18','2026-05-17 09:25:18'),(3,'kuota','4 Rombongan Belajar','string','Kuota penerimaan siswa baru','2026-05-17 09:25:18','2026-05-17 09:25:18'),(4,'usia_min','6','integer','Usia minimum siswa (tahun)','2026-05-17 09:25:18','2026-05-17 09:25:18'),(5,'usia_max','7','integer','Usia maksimum siswa (tahun)','2026-05-17 09:25:18','2026-05-17 09:25:18'),(6,'usia_text','6 â€“ 7 Tahun','string','Teks tampilan usia','2026-05-17 09:25:18','2026-05-17 09:25:18'),(7,'status','Sedang Berlangsung','string','Status PPDB (Belum Dibuka, Sedang Berlangsung, Ditutup)','2026-05-17 09:25:18','2026-05-17 09:25:18'),(8,'peringatan_daftar_ulang','Jika calon siswa yang sudah dinyatakan diterima tidak melakukan daftar ulang sesuai jadwal, maka dianggap mengundurkan diri.','string','Peringatan untuk daftar ulang','2026-05-17 09:25:18','2026-05-17 09:25:18');
/*!40000 ALTER TABLE `ppdb_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppdb_dokumen`
--

DROP TABLE IF EXISTS `ppdb_dokumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ppdb_dokumen` (
  `id_ppdb_dokumen` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `wajib` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Dokumen wajib atau opsional',
  `urutan` int NOT NULL DEFAULT '0' COMMENT 'Urutan tampilan',
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ppdb_dokumen`),
  KEY `urutan` (`urutan`),
  KEY `aktif` (`aktif`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppdb_dokumen`
--

LOCK TABLES `ppdb_dokumen` WRITE;
/*!40000 ALTER TABLE `ppdb_dokumen` DISABLE KEYS */;
INSERT INTO `ppdb_dokumen` VALUES (1,'Kartu Keluarga asli + fotocopy 2 lembar',NULL,0,1,1,'2026-05-17 09:24:05','2026-05-17 09:24:05',NULL),(2,'Akta Kelahiran asli + fotocopy 2 lembar',NULL,0,2,1,'2026-05-17 09:24:05','2026-05-17 09:24:05',NULL),(3,'Materai 2 buah',NULL,0,3,1,'2026-05-17 09:24:05','2026-05-17 09:24:05',NULL),(4,'Surat Keterangan Balita Sehat asli + fotocopy 2 lembar',NULL,0,4,1,'2026-05-17 09:24:05','2026-05-17 09:24:05',NULL),(5,'Ijazah TK (jika ada) fotocopy 2 lembar',NULL,0,5,1,'2026-05-17 09:24:05','2026-05-17 09:24:05',NULL),(6,'Kartu PIP/PKH (jika ada)',NULL,0,6,1,'2026-05-17 09:24:05','2026-05-17 09:24:05',NULL),(7,'Map kertas biola 2 buah (laki-laki biru dan perempuan kuning)',NULL,0,7,1,'2026-05-17 09:24:05','2026-05-17 09:24:05',NULL);
/*!40000 ALTER TABLE `ppdb_dokumen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppdb_jadwal`
--

DROP TABLE IF EXISTS `ppdb_jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ppdb_jadwal` (
  `id_ppdb_jadwal` int unsigned NOT NULL AUTO_INCREMENT,
  `jalur` varchar(100) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nama jalur pendaftaran (Afirmasi, Domisili, dll)',
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ppdb_jadwal`),
  KEY `jalur` (`jalur`),
  KEY `aktif` (`aktif`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppdb_jadwal`
--

LOCK TABLES `ppdb_jadwal` WRITE;
/*!40000 ALTER TABLE `ppdb_jadwal` DISABLE KEYS */;
INSERT INTO `ppdb_jadwal` VALUES (1,'Afirmasi & Perpindahan Orang Tua','2026-05-11','2026-05-30','Jalur Afirmasi & Perpindahan Orang Tua',0,'2026-05-17 09:24:05','2026-05-17 09:24:05',NULL),(2,'Domisili','2026-06-22','2026-06-30','Jalur Domisili',0,'2026-05-17 09:24:05','2026-05-17 09:24:05',NULL);
/*!40000 ALTER TABLE `ppdb_jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppdb_laporan_tahunan`
--

DROP TABLE IF EXISTS `ppdb_laporan_tahunan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ppdb_laporan_tahunan` (
  `id_ppdb_laporan_tahunan` int unsigned NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(20) NOT NULL COMMENT 'Format: 2025/2026',
  `tahun` year NOT NULL COMMENT 'Tahun laporan (2025 atau 2026)',
  `total_pendaftar` int unsigned NOT NULL DEFAULT '0',
  `total_diterima` int unsigned NOT NULL DEFAULT '0',
  `total_menunggu` int unsigned NOT NULL DEFAULT '0',
  `total_ditolak` int unsigned NOT NULL DEFAULT '0',
  `total_laki_laki` int unsigned NOT NULL DEFAULT '0',
  `total_perempuan` int unsigned NOT NULL DEFAULT '0',
  `rata_rata_usia` decimal(5,2) NOT NULL DEFAULT '0.00',
  `catatan` text,
  `file_laporan` varchar(255) DEFAULT NULL COMMENT 'Path file laporan PDF/Excel jika ada',
  `dibuat_oleh` int unsigned NOT NULL COMMENT 'User ID yang membuat laporan',
  `status` enum('Draft','Final','Arsip') NOT NULL DEFAULT 'Draft',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ppdb_laporan_tahunan`),
  KEY `idx_tahun_ajaran` (`tahun_ajaran`),
  KEY `idx_tahun` (`tahun`),
  KEY `idx_status` (`status`),
  KEY `idx_dibuat_oleh` (`dibuat_oleh`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Laporan tahunan ringkasan data PPDB';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppdb_laporan_tahunan`
--

LOCK TABLES `ppdb_laporan_tahunan` WRITE;
/*!40000 ALTER TABLE `ppdb_laporan_tahunan` DISABLE KEYS */;
INSERT INTO `ppdb_laporan_tahunan` VALUES (1,'2026/2027',2026,5,2,2,1,0,0,6.20,'',NULL,1,'Draft','2026-05-16 23:10:03','2026-05-16 23:10:03',NULL);
/*!40000 ALTER TABLE `ppdb_laporan_tahunan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'bcrypt hash',
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `role` enum('Super Admin','Kepala Sekolah','Operator') NOT NULL DEFAULT 'Operator',
  `avatar` varchar(10) DEFAULT 'A',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `reset_token` varchar(64) DEFAULT NULL COMMENT 'Token untuk reset password',
  `token_expire` datetime DEFAULT NULL COMMENT 'Waktu expired token reset password',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Akun administrator';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','admin','$2y$10$IqU5uCbltUu8abMQ2TKODewddQbuaAAgU.bEKUQ/MGixM7kPmnn66','admin@sdn56pbm.sch.id',NULL,'Super Admin','A','2026-05-16 21:59:26',NULL,NULL,NULL),(2,'Dra. Hj. Siti Rahayu','kepala','$2y$10$xajIzLzxnFyKHvU5RmCnO.4ezTG6yMXl60j/Un2STmxVNzdDLUzjy','kepala@sdn56pbm.sch.id',NULL,'Kepala Sekolah','K','2026-05-16 21:59:26',NULL,NULL,NULL),(3,'Operator Sekolah','operator','$2y$10$Q6O38Nvh.irVZJ.TLyazSOV/UgGBCix2wsxyPS3Jsj/cPM6evmejq','operator@sdn56pbm.sch.id',NULL,'Operator','O','2026-05-16 21:59:26',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-23 22:16:21
