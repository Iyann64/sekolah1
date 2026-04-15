<!-- ════════ NAVBAR ════════ -->
<?php
    $uri     = service('uri');
    $segment = $uri->getSegment(1) ?: '';
?>
<nav class="navbar" id="navbar">
    <div class="nav-brand">
        <img class="nav-logo" src="<?= base_url('assets/img/logo.png') ?>" alt="Logo SDN 56">
        <div class="nav-name">
        <strong>SD Negeri 56 Prabumulih</strong>
        <span>Cerdas · Berkarakter · Berprestasi</span>
        </div>
    </div>
    <ul class="nav-links">
        <li><a href="<?= base_url('/') ?>"        class="<?= $segment === ''        ? 'active' : '' ?>">Beranda</a></li>
        <li><a href="<?= base_url('tentang') ?>"  class="<?= $segment === 'tentang' ? 'active' : '' ?>">Tentang</a></li>
        <li><a href="<?= base_url('program') ?>"  class="<?= $segment === 'program' ? 'active' : '' ?>">Program</a></li>
        <li><a href="<?= base_url('berita') ?>"   class="<?= $segment === 'berita'  ? 'active' : '' ?>">Berita</a></li>
        <li><a href="<?= base_url('galeri') ?>"   class="<?= $segment === 'galeri'  ? 'active' : '' ?>">Galeri</a></li>
        <li><a href="<?= base_url('kontak') ?>"   class="<?= $segment === 'kontak'  ? 'active' : '' ?>">Kontak</a></li>
    </ul>
    <div class="nav-right">
        <button class="notif-btn" onclick="openSheet()" aria-label="Notifikasi">
        🔔<div class="notif-dot"></div>
        </button>
        <a href="<?= base_url('ppdb') ?>" class="btn-daftar">✏️ Daftar PPDB →</a>
        <button class="hamburger" id="ham" aria-label="Buka menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobileMenu">
    <button class="mm-close" id="mmClose">✕</button>
    <a href="<?= base_url('/') ?>">🏠 Beranda</a>
    <a href="<?= base_url('tentang') ?>">🏫 Tentang Kami</a>
    <a href="<?= base_url('program') ?>">📚 Program</a>
    <a href="<?= base_url('berita') ?>">📰 Berita</a>
    <a href="<?= base_url('galeri') ?>">🖼️ Galeri</a>
    <a href="<?= base_url('kontak') ?>">📞 Kontak</a>
    <a href="<?= base_url('ppdb') ?>" style="color:var(--c1);background:var(--c5);border-bottom:none;margin-top:8px">✏️ PPDB 2026/2027</a>
</div>