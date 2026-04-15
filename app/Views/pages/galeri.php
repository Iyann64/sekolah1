    <!-- ════════ HERO ════════ -->
    <section class="hero" id="galeri" style="min-height:40vh;padding:80px 64px">
    <div class="hero-grid"></div>
    <div class="orb1 hero-orb"></div>
    <div class="hero-content" style="max-width:600px">
        <div class="hero-eyebrow">Dokumentasi Kegiatan</div>
        <h1 style="font-size:clamp(32px,5vw,64px)">Galeri <span class="acc">Foto</span><br>& Kegiatan</h1>
        <p class="hero-sub">Kumpulan momen terbaik kegiatan belajar, prestasi, dan kehidupan sehari-hari di <?= esc($site_name) ?>.</p>
    </div>
    </section>

    <!-- ════════ GALERI GRID ════════ -->
    <section class="galeri" style="padding:80px 64px">
    <div class="gal-filter reveal">
        <button class="gf active" onclick="filterGal(this,'all')">Semua</button>
        <?php foreach ($kategori as $k): ?>
        <button class="gf" onclick="filterGal(this,'<?= esc($k) ?>')"><?= esc($k) ?></button>
        <?php endforeach; ?>
    </div>

    <?php
    $bgColors = [
        'Fasilitas'   => 'linear-gradient(135deg,#006064,#00838F)',
        'Prestasi'    => 'linear-gradient(135deg,#004D40,#00695C)',
        'Kegiatan'    => 'linear-gradient(135deg,#0D47A1,#1565C0)',
        'Lingkungan'  => 'linear-gradient(135deg,#1B5E20,#2E7D32)',
        'Olahraga'    => 'linear-gradient(135deg,#B71C1C,#C62828)',
        'Seni Budaya' => 'linear-gradient(135deg,#4A148C,#6A1B9A)',
    ];
    ?>
    <div class="gal-grid reveal" id="galGrid">
        <?php if (!empty($galeri)): foreach ($galeri as $i => $g):
        $bg = $bgColors[$g['kategori']] ?? 'linear-gradient(135deg,var(--c1),var(--c2))';
        $isFirst = $i === 0;
        $thumb   = $g['file_foto'] ? base_url('uploads/'.$g['file_foto']) : null;
        ?>
        <div class="gi <?= $isFirst ? 'gi1' : 'gi'.min($i+1,7) ?>"
            style="background:<?= $thumb ? "url('$thumb') center/cover" : $bg ?>"
            data-cat="<?= esc($g['kategori']) ?>">
        <?php if (!$thumb): ?><span><?= esc($g['emoji'] ?? '🖼️') ?></span><?php endif; ?>
        <div class="gi-ov">
            <div class="gi-cap"><?= esc($g['nama']) ?></div>
        </div>
        </div>
        <?php endforeach; else: ?>
        <!-- Fallback statis jika DB kosong -->
        <div class="gi gi1" style="background:linear-gradient(135deg,#006064,#00838F)">🏫<div class="gi-ov"><div class="gi-cap">Gedung SDN 56 Prabumulih</div></div></div>
        <div class="gi gi2" style="background:linear-gradient(135deg,#004D40,#00695C)">🏆<div class="gi-ov"><div class="gi-cap">Olimpiade Sains 2026</div></div></div>
        <div class="gi gi3" style="background:linear-gradient(135deg,#0D47A1,#1565C0)">🎭<div class="gi-ov"><div class="gi-cap">Pentas Seni Tahunan</div></div></div>
        <div class="gi gi4" style="background:linear-gradient(135deg,#4A148C,#6A1B9A)">⚽<div class="gi-ov"><div class="gi-cap">Turnamen Futsal Antar Kelas</div></div></div>
        <div class="gi gi5" style="background:linear-gradient(135deg,#B71C1C,#C62828)">🌱<div class="gi-ov"><div class="gi-cap">Program Adiwiyata</div></div></div>
        <div class="gi gi6" style="background:linear-gradient(135deg,#E65100,#EF6C00)">🎓<div class="gi-ov"><div class="gi-cap">Wisuda Kelas 6 · 2025</div></div></div>
        <div class="gi gi7" style="background:linear-gradient(135deg,#1B5E20,#2E7D32)">📚<div class="gi-ov"><div class="gi-cap">Perpustakaan Sekolah</div></div></div>
        <?php endif; ?>
    </div>
    </section>

    <script>
    function filterGal(btn, cat) {
    document.querySelectorAll('.gf').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('#galGrid .gi').forEach(el => {
        const elCat = el.dataset.cat;
        el.style.display = (cat === 'all' || elCat === cat) ? '' : 'none';
    });
    }
    </script>