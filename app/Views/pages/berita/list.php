    <!-- ════════ HERO ════════ -->
    <section class="hero" id="berita" style="min-height:45vh">
    <div class="hero-grid"></div>
    <div class="orb1 hero-orb"></div>
    <div class="orb2 hero-orb"></div>
    <div class="hero-content">
        <div class="hero-eyebrow">SD Negeri 56 Prabumulih · Berita & Kegiatan</div>
        <h1>Informasi<br><span class="acc">Terkini</span></h1>
        <p class="hero-sub">Ikuti perkembangan terbaru, prestasi, dan kegiatan sehari-hari di SD Negeri 56 Prabumulih.</p>
    </div>
    <div class="hero-scroll"><div class="scroll-line"></div><span>Scroll</span></div>
    </section>

    <!-- ════════ FILTER KATEGORI ════════ -->
    <div class="berita-filter-bar">
    <div class="berita-filter-inner">
        <span class="bf-label">Filter:</span>
        <div class="bf-tabs">
        <a href="<?= base_url('berita') ?>"
            class="p-tab <?= !$kategori ? 'active' : '' ?>">
            Semua
        </a>
        <?php foreach ($kategori_list as $k): ?>
        <a href="<?= base_url('berita?kategori='.urlencode($k)) ?>"
            class="p-tab <?= $kategori === $k ? 'active' : '' ?>">
            <?= esc($k) ?>
        </a>
        <?php endforeach; ?>
        </div>
    </div>
    </div>

    <!-- ════════ KONTEN BERITA ════════ -->
    <section class="berita" style="background:var(--light)">

    <?php if (empty($berita)): ?>
    <!-- Kosong -->
    <div class="berita-empty">
        <div class="be-icon">📭</div>
        <div class="be-title">Belum ada berita</div>
        <p class="be-sub">Belum ada berita dalam kategori ini. Coba pilih kategori lain.</p>
        <a href="<?= base_url('berita') ?>" class="btn-hero-p" style="display:inline-flex;margin-top:8px">← Lihat Semua Berita</a>
    </div>

    <?php else:
        $icons  = ['Prestasi'=>'🏆','Kegiatan'=>'🎉','Akademik'=>'📚','Lingkungan'=>'🌿','Seni Budaya'=>'🎨','Olahraga'=>'⚽'];
        $colors = ['Prestasi'=>'linear-gradient(135deg,#004D40,#00695C)','Kegiatan'=>'linear-gradient(135deg,#0D47A1,#1565C0)','Akademik'=>'linear-gradient(135deg,#4A148C,#6A1B9A)','Lingkungan'=>'linear-gradient(135deg,#1B5E20,#2E7D32)','Seni Budaya'=>'linear-gradient(135deg,#E65100,#EF6C00)','Olahraga'=>'linear-gradient(135deg,#B71C1C,#C62828)'];
        $first  = array_shift($berita);
    ?>

    <!-- ── Berita Utama ───────────────────── -->
    <a href="<?= base_url('berita/'.$first['slug']) ?>" class="news-featured reveal">
        <div class="nf-thumb"><?= $icons[$first['kategori']] ?? '📰' ?></div>
        <div class="nf-body">
        <div class="nf-cat">📌 <?= esc($first['kategori']) ?></div>
        <div class="nf-title"><?= esc($first['judul']) ?></div>
        <p class="nf-excerpt"><?= esc(character_limiter(strip_tags($first['isi'] ?? ''), 200)) ?></p>
        <div class="nf-meta">
            <span>📅 <?= date('d F Y', strtotime($first['tanggal'])) ?></span>
            <span>👁 <?= number_format($first['views'] ?? 0) ?> dibaca</span>
            <span>🏷 <?= esc($first['kategori']) ?></span>
            <span class="nf-readmore">Baca selengkapnya →</span>
        </div>
        </div>
    </a>

    <!-- ── Grid Berita ───────────────────── -->
    <?php if (!empty($berita)): ?>
    <div class="berita-grid">
        <?php foreach ($berita as $i => $b):
        $bg = $colors[$b['kategori']] ?? 'linear-gradient(135deg,var(--c1),var(--c3))';
        $ic = $icons[$b['kategori']] ?? '📰';
        ?>
        <a href="<?= base_url('berita/'.$b['slug']) ?>"
        class="berita-card reveal <?= $i > 0 ? 'd'.min($i,4) : '' ?>">
        <!-- Thumbnail -->
        <div class="bc-thumb" style="background:<?= $b['thumbnail'] ? "url('".base_url('uploads/'.$b['thumbnail'])."') center/cover" : $bg ?>">
            <?php if (!$b['thumbnail']): ?>
            <span class="bc-thumb-ic"><?= $ic ?></span>
            <?php endif; ?>
            <span class="bc-kat"><?= esc($b['kategori']) ?></span>
        </div>
        <!-- Body -->
        <div class="bc-body">
            <div class="bc-title"><?= esc($b['judul']) ?></div>
            <p class="bc-excerpt"><?= esc(character_limiter(strip_tags($b['isi'] ?? ''), 90)) ?></p>
            <div class="bc-meta">
            <span>📅 <?= date('d M Y', strtotime($b['tanggal'])) ?></span>
            <span>👁 <?= number_format($b['views'] ?? 0) ?></span>
            </div>
        </div>
        </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- ── Paginasi ──────────────────────── -->
    <?php if ($pager): ?>
    <div class="pager-wrap">
        <?= $pager->links('default', 'default_full') ?>
    </div>
    <?php endif; ?>

    <?php endif; ?>
    </section>

    <style>
    /* ─── Berita List Page ─────────────────────────────── */
    .berita-filter-bar{background:var(--white);border-bottom:1px solid rgba(0,188,212,.1);padding:16px 64px;position:sticky;top:64px;z-index:90;backdrop-filter:blur(8px)}
    .berita-filter-inner{display:flex;align-items:center;gap:12px;flex-wrap:wrap;max-width:1200px;margin:0 auto}
    .bf-label{font-size:12px;font-weight:800;color:var(--gray);letter-spacing:1px;text-transform:uppercase;flex-shrink:0}
    .bf-tabs{display:flex;gap:8px;flex-wrap:wrap}

    .berita-empty{text-align:center;padding:100px 20px}
    .be-icon{font-size:64px;margin-bottom:16px}
    .be-title{font-size:22px;font-weight:700;color:var(--ink);margin-bottom:8px}
    .be-sub{font-size:14px;color:var(--gray);max-width:340px;margin:0 auto 24px}

    .news-featured{display:flex;gap:28px;background:var(--white);border-radius:18px;padding:28px 64px;margin-bottom:0;box-shadow:none;border:none;border-bottom:1px solid rgba(0,188,212,.08);text-decoration:none;transition:background .2s}
    .news-featured:hover{background:var(--c5)}
    .nf-readmore{margin-left:auto;color:var(--c3);font-weight:700}

    .berita-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;padding:32px 64px}
    .berita-card{background:var(--white);border-radius:16px;overflow:hidden;text-decoration:none;box-shadow:0 2px 16px rgba(0,96,100,.06);border:1px solid rgba(0,188,212,.06);transition:all .25s;display:flex;flex-direction:column}
    .berita-card:hover{transform:translateY(-4px);box-shadow:0 10px 36px rgba(0,96,100,.14)}
    .bc-thumb{height:160px;display:flex;align-items:flex-end;justify-content:flex-start;position:relative;padding:12px}
    .bc-thumb-ic{position:absolute;top:50%;left:50%;transform:translate(-50%,-60%);font-size:52px;opacity:.9}
    .bc-kat{background:rgba(0,0,0,.45);color:white;font-size:10px;font-weight:800;letter-spacing:1.2px;text-transform:uppercase;padding:4px 10px;border-radius:100px;backdrop-filter:blur(4px)}
    .bc-body{padding:18px;flex:1;display:flex;flex-direction:column;gap:8px}
    .bc-title{font-family:'Cormorant Garamond',serif;font-size:17px;font-weight:700;color:var(--ink);line-height:1.35;flex:1}
    .bc-excerpt{font-size:12px;color:var(--gray);line-height:1.6;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
    .bc-meta{display:flex;align-items:center;justify-content:space-between;font-size:11px;color:var(--gray);padding-top:10px;border-top:1px solid var(--light);margin-top:auto}

    .pager-wrap{display:flex;justify-content:center;padding:32px 64px}

    @media(max-width:900px){
    .berita-filter-bar{padding:14px 20px;top:56px}
    .news-featured{padding:20px;flex-direction:column;gap:16px}
    .berita-grid{grid-template-columns:1fr 1fr;gap:14px;padding:20px}
    }
    @media(max-width:600px){
    .berita-grid{grid-template-columns:1fr;padding:16px}
    }
    </style>