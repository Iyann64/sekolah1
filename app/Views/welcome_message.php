<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SD Negeri 56 Prabumulih – Cerdas, Berkarakter, Berprestasi</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;0,900;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<!-- ════════ TICKER ════════ -->
<div class="ticker">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-dot"></span>🎓 PPDB 2026/2027 segera dibuka — daftarkan putra-putri Anda sekarang!</span>
    <span class="ticker-item"><span class="ticker-dot"></span>🏆 SDN 56 Prabumulih raih Juara 1 Olimpiade Sains Kota Prabumulih 2026</span>
    <span class="ticker-item"><span class="ticker-dot"></span>📅 UAS Genap dilaksanakan 10–15 Maret 2026</span>
    <span class="ticker-item"><span class="ticker-dot"></span>🌱 Kegiatan Adiwiyata Sekolah Hijau setiap Jumat pagi</span>
    <span class="ticker-item"><span class="ticker-dot"></span>🎨 8 siswa SDN 56 tampil di Festival Budaya Prabumulih 2026</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-dot"></span>🎓 PPDB 2026/2027 segera dibuka — daftarkan putra-putri Anda sekarang!</span>
    <span class="ticker-item"><span class="ticker-dot"></span>🏆 SDN 56 Prabumulih raih Juara 1 Olimpiade Sains Kota Prabumulih 2026</span>
    <span class="ticker-item"><span class="ticker-dot"></span>📅 UAS Genap dilaksanakan 10–15 Maret 2026</span>
    <span class="ticker-item"><span class="ticker-dot"></span>🌱 Kegiatan Adiwiyata Sekolah Hijau setiap Jumat pagi</span>
    <span class="ticker-item"><span class="ticker-dot"></span>🎨 8 siswa SDN 56 tampil di Festival Budaya Prabumulih 2026</span>
  </div>
</div>

<!-- ════════ NAVBAR ════════ -->
<nav class="navbar" id="navbar">
  <div class="nav-brand">
    <img class="nav-logo" src="images/logo.png" alt="Logo SDN 56">
    <div class="nav-name">
      <strong>SD Negeri 56 Prabumulih</strong>
      <span>Cerdas · Berkarakter · Berprestasi</span>
    </div>
  </div>
  <ul class="nav-links">
    <li><a href="#beranda" class="active">Beranda</a></li>
    <li><a href="#tentang">Tentang</a></li>
    <li><a href="#program">Program</a></li>
    <li><a href="#berita">Berita</a></li>
    <li><a href="#galeri">Galeri</a></li>
    <li><a href="#kontak">Kontak</a></li>
  </ul>
  <div class="nav-right">
    <button class="notif-btn" onclick="openSheet()" aria-label="Notifikasi">
      🔔<div class="notif-dot"></div>
    </button>
    <a href="#ppdb"   class="btn-daftar">✏️ Daftar PPDB →</a>
  </div>
  <button class="hamburger" id="ham" aria-label="Buka menu">
    <span></span><span></span><span></span>
  </button>
</nav>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobileMenu">
  <button class="mm-close" id="mmClose">✕</button>
  <a href="#beranda">🏠 Beranda</a>
  <a href="#tentang">🏫 Tentang Kami</a>
  <a href="#program">📚 Program</a>
  <a href="#berita">📰 Berita</a>
  <a href="#galeri">🖼️ Galeri</a>
  <a href="#kontak">📞 Kontak</a>
  <a href="#ppdb" style="color:var(--c1);background:var(--c5);border-bottom:none;margin-top:8px">✏️ PPDB 2026/2027</a>
</div>

<!-- ════════ HERO ════════ -->
<section class="hero" id="beranda">
  <div class="hero-grid"></div>
  <div class="orb1 hero-orb"></div>
  <div class="orb2 hero-orb"></div>
  <div class="orb3 hero-orb"></div>

  <div class="hero-content">
    <div class="hero-eyebrow">SD Negeri 56 · Prabumulih, Sumatera Selatan</div>
    <h1>Sekolah Unggul<br>untuk Generasi<br><span class="acc">Masa Depan</span></h1>
    <p class="hero-sub">Mendidik dengan hati, membentuk karakter mulia, dan mempersiapkan generasi penerus bangsa yang cerdas, kreatif, dan berdaya saing global.</p>
    <div class="hero-btns">
      <a href="#tentang" class="btn-hero-p">🏫 Jelajahi Sekolah</a>
      <a href="#ppdb"    class="btn-hero-s">✏️ Daftar PPDB 2026</a>
    </div>
  </div>

  <!-- Hero visual card (desktop only) -->
  <div class="hero-visual">
    <div class="hero-card">
      <div class="fl-badge fb1">
        <span class="fb-ic">🏆</span>
        <div>
          <div style="font-weight:700;font-size:12px">Juara 1 Olimpiade</div>
          <div style="font-size:11px;color:var(--gray);font-weight:400">Sains Kota 2026</div>
        </div>
      </div>
      <div class="hero-logo-ring">
        <img src="images/logo.png" alt="Logo SDN 56">
      </div>
      <div class="hc-name">SD Negeri 56</div>
      <div class="hc-loc">📍 Prabumulih, Sumsel</div>
      <div class="hc-stats">
        <div class="hcs"><div class="hcs-n">500+</div><div class="hcs-l">Siswa</div></div>
        <div class="hcs"><div class="hcs-n">A+</div><div class="hcs-l">Akreditasi</div></div>
        <div class="hcs"><div class="hcs-n">30+</div><div class="hcs-l">Guru</div></div>
        <div class="hcs"><div class="hcs-n">100%</div><div class="hcs-l">Lulus</div></div>
      </div>
      <div class="fl-badge fb2">
        <span class="fb-ic">⭐</span>
        <div>
          <div style="font-weight:700;font-size:12px">Akreditasi A+</div>
          <div style="font-size:11px;color:var(--gray);font-weight:400">BAN-S/M 2024</div>
        </div>
      </div>
    </div>
  </div>

  <div class="hero-scroll">
    <div class="scroll-line"></div>
    <span>Scroll</span>
  </div>
</section>

<!-- ════════ STATS BAR ════════ -->
<div class="stats-bar">
  <div class="stat-tile"><div class="stn" data-target="512">0</div><div class="stl">Siswa Aktif</div></div>
  <div class="stat-tile"><div class="stn" data-target="32">0</div><div class="stl">Tenaga Pengajar</div></div>
  <div class="stat-tile"><div class="stn" data-target="25">0</div><div class="stl">Tahun Berdiri</div></div>
  <div class="stat-tile"><div class="stn" data-target="100">0</div><div class="stl">% Kelulusan</div></div>
  <div class="stat-tile"><div class="stn" data-target="47">0</div><div class="stl">Prestasi Diraih</div></div>
  <div class="stat-tile"><div class="stn" data-target="6">0</div><div class="stl">Ekstrakurikuler</div></div>
</div>

<!-- ════════ TENTANG ════════ -->
<section class="about" id="tentang">
  <div class="about-visual reveal">
    <div class="av-bg">
      <img class="av-logo" src="images/logo.png" alt="Logo SDN 56">
    </div>
    <div class="av-badge"><div class="avb-n">A+</div><div class="avb-t">Akreditasi BAN-S/M</div></div>
    <div class="av-badge2"><div class="avb2-n">25+</div><div class="avb2-t">Tahun Berdiri</div></div>
  </div>
  <div class="reveal d1">
    <div class="tag">Tentang Kami</div>
    <h2 class="sec-title">Profil SD Negeri 56<br><em>Prabumulih</em></h2>
    <p class="sec-sub">Berkomitmen penuh membentuk generasi penerus bangsa yang unggul, berkarakter, dan siap menghadapi tantangan abad ke-21.</p>
    <div class="vm-list">
      <div class="vm-card">
        <div class="vm-head"><span style="font-size:20px">🌟</span><span class="vm-lbl">Visi</span></div>
        <p class="vm-txt">Terwujudnya sekolah unggul dalam prestasi, berkarakter Pancasila, dan berwawasan lingkungan yang relevan dengan kebutuhan global.</p>
      </div>
      <div class="vm-card">
        <div class="vm-head"><span style="font-size:20px">🎯</span><span class="vm-lbl">Misi</span></div>
        <p class="vm-txt">Melaksanakan pembelajaran inovatif berbasis teknologi, membina akhlak mulia, dan mengembangkan potensi siswa secara holistik.</p>
      </div>
      <div class="vm-card" style="border-left-color:var(--gold);background:#FFF8E1">
        <div class="vm-head"><span style="font-size:20px">🧭</span><span class="vm-lbl" style="color:var(--gold2)">Motto</span></div>
        <p class="vm-txt" style="font-family:'Cormorant Garamond',serif;font-size:18px;font-weight:700;color:var(--c1);font-style:italic">"Cerdas, Berkarakter, Berprestasi"</p>
      </div>
    </div>
  </div>
</section>

<!-- ════════ SMART FEATURES ════════ -->
<div class="smart">
  <div class="smart-head reveal">
    <div class="tag">Layanan Digital</div>
    <h2 class="sec-title">Akses Cepat <em>Layanan Sekolah</em></h2>
    <p class="sec-sub">Semua informasi dan layanan sekolah kini mudah diakses secara digital oleh siswa, orang tua, dan masyarakat.</p>
  </div>
  <div class="smart-grid">
    <div class="sc reveal d1"><div class="sc-ic sci1">📊</div><div class="sc-title">Portal Nilai</div><div class="sc-desc">Cek rapor & akademik real-time</div></div>
    <div class="sc reveal d2"><div class="sc-ic sci2">📋</div><div class="sc-title">PPDB Online</div><div class="sc-desc">Daftar siswa baru online</div></div>
    <div class="sc reveal d3"><div class="sc-ic sci3">📅</div><div class="sc-title">Jadwal</div><div class="sc-desc">Jadwal harian & mingguan</div></div>
    <div class="sc reveal d4"><div class="sc-ic sci4">📢</div><div class="sc-title">Pengumuman</div><div class="sc-desc">Info & pengumuman terkini</div></div>
    <div class="sc reveal d1"><div class="sc-ic sci5">💳</div><div class="sc-title">Bayar SPP</div><div class="sc-desc">Status & riwayat pembayaran</div></div>
    <div class="sc reveal d2"><div class="sc-ic sci6">📚</div><div class="sc-title">E-Library</div><div class="sc-desc">Buku digital tersedia online</div></div>
    <div class="sc reveal d3"><div class="sc-ic sci7">✅</div><div class="sc-title">Absensi</div><div class="sc-desc">Rekapitulasi kehadiran harian</div></div>
    <div class="sc reveal d4"><div class="sc-ic sci8">💬</div><div class="sc-title">Konsultasi</div><div class="sc-desc">Tanya jawab dengan guru</div></div>
  </div>
</div>

<!-- ════════ PROGRAM ════════ -->
<section class="programs" id="program">
  <div class="prog-head reveal">
    <div>
      <div class="tag">Program</div>
      <h2 class="sec-title" style="margin-bottom:0">Kurikulum <em>Kami</em></h2>
    </div>
    <p class="sec-sub" style="margin-bottom:0">Program holistik untuk akademik, karakter, dan kreativitas.</p>
  </div>
  <div class="prog-tabs reveal">
    <button class="p-tab active" onclick="filterProg(this,'all')">Semua</button>
    <button class="p-tab" onclick="filterProg(this,'akademik')">Akademik</button>
    <button class="p-tab" onclick="filterProg(this,'karakter')">Karakter</button>
    <button class="p-tab" onclick="filterProg(this,'ekskul')">Ekskul</button>
  </div>
  <div class="prog-grid">
    <div class="prog-card reveal"    data-cat="akademik"><div class="pc-top pct1">📚</div><div class="pc-body"><span class="pc-tag">Akademik</span><div class="pc-title">Kurikulum Merdeka</div><p class="pc-desc">Pembelajaran berbasis proyek yang mendorong kreativitas dan berpikir kritis.</p></div></div>
    <div class="prog-card reveal d1" data-cat="akademik"><div class="pc-top pct2">💻</div><div class="pc-body"><span class="pc-tag">Akademik</span><div class="pc-title">Literasi Digital</div><p class="pc-desc">Pengenalan teknologi dan coding sejak dini untuk generasi siap digital.</p></div></div>
    <div class="prog-card reveal d2" data-cat="karakter"><div class="pc-top pct3">🌱</div><div class="pc-body"><span class="pc-tag" style="background:#E8F5E9;color:#2E7D32">Karakter</span><div class="pc-title">Pendidikan Karakter</div><p class="pc-desc">Nilai Pancasila, religius, dan nasionalisme dalam kehidupan sehari-hari.</p></div></div>
    <div class="prog-card reveal"    data-cat="ekskul"><div class="pc-top pct4">🎨</div><div class="pc-body"><span class="pc-tag" style="background:#FCE4EC;color:#C62828">Ekskul</span><div class="pc-title">Seni & Budaya</div><p class="pc-desc">Tari tradisional, melukis, musik, dan kerajinan tangan.</p></div></div>
    <div class="prog-card reveal d1" data-cat="ekskul"><div class="pc-top pct5">⚽</div><div class="pc-body"><span class="pc-tag" style="background:#EDE7F6;color:#6A1B9A">Ekskul</span><div class="pc-title">Olahraga & Paskibra</div><p class="pc-desc">Futsal, bulu tangkis, renang, dan Paskibra untuk jiwa sportif.</p></div></div>
    <div class="prog-card reveal d2" data-cat="karakter"><div class="pc-top pct6">🌿</div><div class="pc-body"><span class="pc-tag" style="background:#E8F5E9;color:#2E7D32">Karakter</span><div class="pc-title">Adiwiyata</div><p class="pc-desc">Cinta lingkungan melalui daur ulang, kebun sekolah, dan penghijauan.</p></div></div>
  </div>
</section>

<!-- ════════ BERITA ════════ -->
<section class="berita" id="berita">
  <div class="reveal">
    <div class="tag">Berita & Kegiatan</div>
    <h2 class="sec-title">Informasi <em>Terkini</em></h2>
    <p class="sec-sub">Ikuti perkembangan, prestasi, dan kegiatan terbaru SD Negeri 56 Prabumulih.</p>
  </div>
  <div class="berita-layout">
    <div>
      <div class="news-featured reveal">
        <div class="nf-thumb">🏅</div>
        <div class="nf-body">
          <div class="nf-cat">🏆 Prestasi</div>
          <div class="nf-title">Siswa SDN 56 Sabet Medali Emas Olimpiade Sains Kota Prabumulih 2026</div>
          <p class="nf-excerpt">Dua siswa terbaik kami meraih medali emas dalam OSN tingkat Kota Prabumulih 2026 bidang Matematika dan IPA.</p>
          <div class="nf-meta">📅 24 Februari 2026 &nbsp;·&nbsp; 👁 1.240 dibaca</div>
        </div>
      </div>
      <div class="news-list reveal d1">
        <div class="nl-item"><div class="nl-thumb">🎓</div><div><div class="nl-title">Wisuda & Pelepasan Kelas 6 TA 2025/2026</div><div class="nl-date">📅 20 Februari 2026</div></div></div>
        <div class="nl-item"><div class="nl-thumb">🌿</div><div><div class="nl-title">SDN 56 Raih Penghargaan Adiwiyata Tingkat Provinsi</div><div class="nl-date">📅 15 Februari 2026</div></div></div>
        <div class="nl-item"><div class="nl-thumb">📚</div><div><div class="nl-title">Implementasi Kurikulum Merdeka: Proyek P5</div><div class="nl-date">📅 10 Februari 2026</div></div></div>
        <div class="nl-item"><div class="nl-thumb">🎨</div><div><div class="nl-title">Pameran Seni di Festival Budaya Prabumulih</div><div class="nl-date">📅 5 Februari 2026</div></div></div>
      </div>
    </div>
    <!-- Sidebar -->
    <div class="reveal d2">
      <div class="sidebar-widget">
        <div class="sw-title">📅 Kalender Akademik</div>
        <div class="cal-nav">
          <span class="cal-arrow" onclick="calMove(-1)">‹</span>
          <span class="cal-month" id="calLabel">Feb 2026</span>
          <span class="cal-arrow" onclick="calMove(1)">›</span>
        </div>
        <div class="cal-grid" id="calGrid"></div>
      </div>
      <div class="sidebar-widget">
        <div class="sw-title">🗓 Agenda Mendatang</div>
        <div class="ag-list">
          <div class="ag-item"><div class="ag-date" style="background:var(--c1)"><div class="ag-day">28</div><div class="ag-mon">Feb</div></div><div><div class="ag-title">Rapat Komite Sekolah</div><div class="ag-desc">Aula SDN 56 · 08.00 WIB</div></div></div>
          <div class="ag-item"><div class="ag-date" style="background:var(--gold2)"><div class="ag-day">05</div><div class="ag-mon">Mar</div></div><div><div class="ag-title">Pembagian Rapor</div><div class="ag-desc">Semua Kelas · 07.30 WIB</div></div></div>
          <div class="ag-item"><div class="ag-date" style="background:#2E7D32"><div class="ag-day">10</div><div class="ag-mon">Mar</div></div><div><div class="ag-title">UAS Genap 2025/2026</div><div class="ag-desc">10–15 Maret · Semua Kelas</div></div></div>
          <div class="ag-item"><div class="ag-date" style="background:#C62828"><div class="ag-day">01</div><div class="ag-mon">Apr</div></div><div><div class="ag-title">Pembukaan PPDB 2026</div><div class="ag-desc">Online & Offline</div></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ════════ GALERI ════════ -->
<section class="galeri" id="galeri">
  <div class="reveal">
    <div class="tag">Galeri</div>
    <h2 class="sec-title">Momen <em style="color:var(--c3)">Terbaik</em> Kami</h2>
  </div>
  <div class="gal-filter reveal">
    <button class="gf active">Semua</button>
    <button class="gf">Kegiatan</button>
    <button class="gf">Prestasi</button>
    <button class="gf">Karya Siswa</button>
    <button class="gf">Fasilitas</button>
  </div>
  <div class="gal-grid reveal">
    <div class="gi gi1">🏫<div class="gi-ov"><div class="gi-cap">Gedung SDN 56 Prabumulih</div></div></div>
    <div class="gi gi2">🏆<div class="gi-ov"><div class="gi-cap">Olimpiade Sains Kota 2026</div></div></div>
    <div class="gi gi3">🎭<div class="gi-ov"><div class="gi-cap">Pentas Seni Tahunan</div></div></div>
    <div class="gi gi4">⚽<div class="gi-ov"><div class="gi-cap">Turnamen Futsal Antar Kelas</div></div></div>
    <div class="gi gi5">🌱<div class="gi-ov"><div class="gi-cap">Program Adiwiyata</div></div></div>
    <div class="gi gi6">🎓<div class="gi-ov"><div class="gi-cap">Wisuda Kelas 6 · 2025</div></div></div>
    <div class="gi gi7">📚<div class="gi-ov"><div class="gi-cap">Perpustakaan Sekolah</div></div></div>
  </div>
</section>

<!-- ════════ PRESTASI ════════ -->
<section class="prestasi">
  <div style="text-align:center;margin-bottom:48px" class="reveal">
    <div class="tag">Kebanggaan Kami</div>
    <h2 class="sec-title">Prestasi <em>Gemilang</em></h2>
    <p class="sec-sub" style="margin:0 auto">Ratusan penghargaan dari berbagai ajang kompetisi bergengsi tingkat kota, provinsi, dan nasional.</p>
  </div>
  <div class="prest-grid">
    <div class="prest-card reveal">   <span class="pm">🥇</span><div class="py">2026</div><div class="pt">Juara 1 Olimpiade Sains Nasional</div><div class="po">Tingkat Kota Prabumulih</div></div>
    <div class="prest-card reveal d1"><span class="pm">🏆</span><div class="py">2025</div><div class="pt">Sekolah Adiwiyata Terbaik</div><div class="po">Tingkat Provinsi Sumsel</div></div>
    <div class="prest-card reveal d2"><span class="pm">🥈</span><div class="py">2025</div><div class="pt">Juara 2 Baca Puisi FLS2N</div><div class="po">Tingkat Provinsi Sumsel</div></div>
    <div class="prest-card reveal d3"><span class="pm">⭐</span><div class="py">2024</div><div class="pt">Akreditasi A Unggul</div><div class="po">BAN-S/M Kemendikbud RI</div></div>
  </div>
</section>

<!-- ════════ GURU ════════ -->
<section class="guru">
  <div style="text-align:center;margin-bottom:48px" class="reveal">
    <div class="tag">Tenaga Pendidik</div>
    <h2 class="sec-title">Tim <em>Pengajar</em> Kami</h2>
    <p class="sec-sub" style="margin:0 auto">Guru-guru berpengalaman dan berdedikasi yang siap membimbing setiap siswa menuju potensi terbaiknya.</p>
  </div>
  <div class="guru-grid">
    <div class="guru-card reveal">   <div class="gc-av ga1">👩‍💼</div><div class="gc-info"><div class="gc-name">Dra. Hj. Siti Rahayu</div><div class="gc-role">Kepala Sekolah</div><div class="gc-nip">NIP: 196805121992</div></div></div>
    <div class="guru-card reveal d1"><div class="gc-av ga2">👨‍🏫</div><div class="gc-info"><div class="gc-name">Budi Santoso, S.Pd</div><div class="gc-role">Guru Kelas 6A</div><div class="gc-nip">NIP: 197203181998</div></div></div>
    <div class="guru-card reveal d2"><div class="gc-av ga3">👩‍🏫</div><div class="gc-info"><div class="gc-name">Dewi Lestari, S.Pd</div><div class="gc-role">Guru Matematika</div><div class="gc-nip">NIP: 198504152010</div></div></div>
    <div class="guru-card reveal d3"><div class="gc-av ga4">👩‍🏫</div><div class="gc-info"><div class="gc-name">Rina Wati, S.Pd</div><div class="gc-role">Guru Bahasa Indonesia</div><div class="gc-nip">NIP: 198901202012</div></div></div>
    <div class="guru-card reveal d4"><div class="gc-av ga5">👨‍🏫</div><div class="gc-info"><div class="gc-name">Ahmad Fauzi, S.Pd</div><div class="gc-role">Guru PJOK</div><div class="gc-nip">NIP: 199002282015</div></div></div>
  </div>
</section>

<!-- ════════ PPDB ════════ -->
<section class="ppdb" id="ppdb">
  <div class="ppdb-inner">
    <div class="tag">PPDB 2026/2027</div>
    <h2 class="sec-title">Daftarkan Putra-Putri<br>Anda Sekarang!</h2>
    <p class="sec-sub">Penerimaan Peserta Didik Baru Tahun Ajaran 2026/2027 segera dibuka. Tempat terbatas — jangan sampai ketinggalan!</p>
    <div class="ppdb-chips">
      <div class="ppdb-chip"><div class="pc-lbl">Dibuka</div><div class="pc-val">1 April 2026</div></div>
      <div class="ppdb-chip"><div class="pc-lbl">Ditutup</div><div class="pc-val">31 Mei 2026</div></div>
      <div class="ppdb-chip"><div class="pc-lbl">Kuota</div><div class="pc-val">4 Rombel</div></div>
      <div class="ppdb-chip"><div class="pc-lbl">Usia</div><div class="pc-val">6–7 Tahun</div></div>
    </div>
    <a href="#kontak" class="btn-ppdb">✏️ Daftar / Tanya Info PPDB →</a>
  </div>
</section>

<!-- ════════ KONTAK ════════ -->
<section class="kontak" id="kontak">
  <div class="reveal">
    <div class="tag">Hubungi Kami</div>
    <h2 class="sec-title">Kontak & <em>Lokasi</em></h2>
  </div>
  <div class="kontak-layout">
    <div class="reveal">
      <p style="font-size:16px;color:var(--gray);line-height:1.75;margin-bottom:32px">Kami senang mendengar dari Anda. Kunjungi langsung atau hubungi kami melalui salah satu saluran di bawah ini.</p>
      <!-- Mobile quick contact -->
      <div class="mobile-cta">
        <a href="https://wa.me/6281234567890" class="mc-btn mc-wa">💬 WhatsApp</a>
        <a href="tel:+627131234567"           class="mc-btn mc-tel">📞 Telepon</a>
      </div>
      <div class="k-items">
        <div class="k-row"><div class="k-icon">📍</div><div><div class="k-lbl">Alamat</div><div class="k-val">Jl. Pendidikan No. 56, Prabumulih</div><div class="k-sub">Sumatera Selatan 31124, Indonesia</div></div></div>
        <div class="k-row"><div class="k-icon">📞</div><div><div class="k-lbl">Telepon</div><div class="k-val">(0713) 123-4567</div><div class="k-sub">Senin – Jumat · 07.00 – 14.00 WIB</div></div></div>
        <div class="k-row"><div class="k-icon">✉️</div><div><div class="k-lbl">Email</div><div class="k-val">sdnegeri56pbm@gmail.com</div><div class="k-sub">Respon dalam 1×24 jam kerja</div></div></div>
        <div class="k-row"><div class="k-icon">📱</div><div><div class="k-lbl">WhatsApp</div><div class="k-val">0812-3456-7890</div><div class="k-sub">Chat langsung dengan TU Sekolah</div></div></div>
      </div>
      <div class="map-box" onclick="alert('Buka Google Maps')">
        <div class="map-inner">
          <div style="font-size:40px;margin-bottom:8px">🗺️</div>
          <div style="font-size:14px;font-weight:600">Peta Lokasi SDN 56 Prabumulih</div>
          <div style="font-size:12px;margin-top:4px;opacity:.7">Klik untuk buka Google Maps</div>
        </div>
      </div>
    </div>
    <div class="reveal d2">
      <div class="form-title">Kirim Pesan</div>
      <div id="formWrap">
        <div class="form-row">
          <div class="fg"><label>Nama Lengkap *</label><input type="text"   id="f-name"  placeholder="Nama Anda"></div>
          <div class="fg"><label>No. Telepon</label>   <input type="tel"   id="f-phone" placeholder="08xx-xxxx-xxxx"></div>
        </div>
        <div class="fg"><label>Email *</label><input type="email" id="f-email" placeholder="email@anda.com"></div>
        <div class="fg">
          <label>Keperluan</label>
          <select id="f-topic">
            <option>Pilih keperluan...</option>
            <option>Informasi PPDB</option>
            <option>Info Program Sekolah</option>
            <option>Pengaduan / Saran</option>
            <option>Kerjasama</option>
            <option>Lainnya</option>
          </select>
        </div>
        <div class="fg"><label>Pesan *</label><textarea id="f-msg" placeholder="Tulis pesan Anda di sini..."></textarea></div>
        <button class="btn-send" onclick="sendForm()">📨 Kirim Pesan</button>
      </div>
      <div class="form-ok" id="formOk">
        <div class="fok-ic">✅</div>
        <h4>Pesan Terkirim!</h4>
        <p>Kami akan membalas dalam 1×24 jam kerja.</p>
      </div>
    </div>
  </div>
</section>

<!-- ════════ FOOTER ════════ -->
<footer>
  <div class="footer-grid">
    <div>
      <div class="fb-row">
        <img class="fb-logo" src="images/logo.png" alt="Logo">
        <div class="fb-nm">SD Negeri 56<br>Prabumulih</div>
      </div>
      <p class="fb-desc">Sekolah dasar negeri yang berkomitmen mendidik generasi unggul, berkarakter Pancasila, dan siap menghadapi tantangan masa depan.</p>
      <div class="fb-soc">
        <div class="soc">📘</div><div class="soc">📸</div>
        <div class="soc">📺</div><div class="soc">💬</div>
      </div>
    </div>
    <div>
      <h4>Navigasi</h4>
      <ul>
        <li><a href="#beranda">Beranda</a></li>
        <li><a href="#tentang">Tentang Kami</a></li>
        <li><a href="#program">Program</a></li>
        <li><a href="#berita">Berita</a></li>
        <li><a href="#galeri">Galeri</a></li>
        <li><a href="#kontak">Kontak</a></li>
      </ul>
    </div>
    <div>
      <h4>Layanan</h4>
      <ul>
        <li><a href="#ppdb">PPDB Online</a></li>
        <li><a href="#">Portal Siswa</a></li>
        <li><a href="#">E-Rapor</a></li>
        <li><a href="#">E-Perpustakaan</a></li>
        <li><a href="#">Absensi Online</a></li>
      </ul>
    </div>
    <div>
      <h4>Informasi</h4>
      <ul>
        <li><a href="#">Kalender Akademik</a></li>
        <li><a href="#">Jadwal Pelajaran</a></li>
        <li><a href="#">Prestasi Sekolah</a></li>
        <li><a href="#">Pengumuman</a></li>
        <li><a href="#">Kebijakan Privasi</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="fc">© 2026 <span>SD Negeri 56 Prabumulih</span> · Semua hak cipta dilindungi</div>
    <div class="fc">Cerdas · Berkarakter · Berprestasi</div>
  </div>
</footer>

<!-- BACK TO TOP -->
<div class="btt" id="btt">↑</div>

<!-- BOTTOM NAV (mobile only) -->
<nav class="bottom-nav" id="bottomNav">
  <div class="bn-item active" onclick="navTo('#beranda',this)"><div class="bn-icon">🏠</div><div class="bn-label">Beranda</div></div>
  <div class="bn-item"        onclick="navTo('#berita',this)"><div class="bn-icon">📰</div><div class="bn-label">Berita</div><div class="bn-dot"></div></div>
  <div class="bn-item"        onclick="navTo('#program',this)"><div class="bn-icon">📚</div><div class="bn-label">Program</div></div>
  <div class="bn-item"        onclick="navTo('#galeri',this)"><div class="bn-icon">🖼️</div><div class="bn-label">Galeri</div></div>
  <div class="bn-item"        onclick="navTo('#tentang',this)"><div class="bn-icon">🏫</div><div class="bn-label">Tentang</div></div>
  <div class="bn-item"        onclick="navTo('#kontak',this)"><div class="bn-icon">💬</div><div class="bn-label">Kontak</div></div>
</nav>

<!-- NOTIFICATION SHEET -->
<div class="sheet-overlay" id="sheetOv">
  <div class="bottom-sheet">
    <div class="sh-handle"></div>
    <div class="sh-title">Notifikasi</div>
    <div class="sh-sub">3 notifikasi baru</div>
    <div class="sh-item"><div class="shi-ic">🏆</div><div class="shi-info"><div class="shi-title">Juara 1 Olimpiade Sains!</div><div class="shi-desc">SDN 56 meraih medali emas · Baru saja</div></div></div>
    <div class="sh-item"><div class="shi-ic">📅</div><div class="shi-info"><div class="shi-title">Pengingat: Rapat Komite</div><div class="shi-desc">28 Feb 2026 · 08.00 WIB</div></div></div>
    <div class="sh-item"><div class="shi-ic">✏️</div><div class="shi-info"><div class="shi-title">PPDB 2026/2027 segera dibuka</div><div class="shi-desc">Mulai 1 April 2026</div></div></div>
  </div>
</div>

<!-- ════════ JAVASCRIPT ════════ -->
<script src="script/script.js"></script>
</body>
</html>