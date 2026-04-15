<?php
$icons  = ['Prestasi'=>'🏆','Kegiatan'=>'🎉','Akademik'=>'📚','Lingkungan'=>'🌿','Seni Budaya'=>'🎨','Olahraga'=>'⚽'];
$colors = ['Prestasi'=>'linear-gradient(135deg,#004D40,#00695C)','Kegiatan'=>'linear-gradient(135deg,#0D47A1,#1565C0)','Akademik'=>'linear-gradient(135deg,#4A148C,#6A1B9A)','Lingkungan'=>'linear-gradient(135deg,#1B5E20,#2E7D32)','Seni Budaya'=>'linear-gradient(135deg,#E65100,#EF6C00)','Olahraga'=>'linear-gradient(135deg,#B71C1C,#C62828)'];
$ic    = $icons[$berita['kategori']]  ?? '📰';
$bg    = $berita['thumbnail'] ? "url('".base_url('uploads/'.$berita['thumbnail'])."') center/cover" : ($colors[$berita['kategori']] ?? 'linear-gradient(135deg,var(--c1),var(--c3))');
?>

<!-- ════════ BREADCRUMB ════════ -->
<div class="breadcrumb-bar">
  <div class="bc-inner">
    <a href="<?= base_url('/') ?>" class="bc-link">Beranda</a>
    <span class="bc-sep">›</span>
    <a href="<?= base_url('berita') ?>" class="bc-link">Berita</a>
    <span class="bc-sep">›</span>
    <a href="<?= base_url('berita?kategori='.urlencode($berita['kategori'])) ?>" class="bc-link"><?= esc($berita['kategori']) ?></a>
    <span class="bc-sep">›</span>
    <span class="bc-active"><?= esc(character_limiter($berita['judul'], 55)) ?></span>
  </div>
</div>

<!-- ════════ LAYOUT UTAMA ════════ -->
<div class="detail-layout">

  <!-- ── ARTIKEL ──────────────────────────── -->
  <article class="artikel-wrap">

    <!-- Header -->
    <div class="artikel-header reveal">
      <!-- Kategori + meta -->
      <div class="ah-meta">
        <span class="ah-kat"><?= esc($berita['kategori']) ?></span>
        <span class="ah-sep">·</span>
        <span>📅 <?= date('d F Y', strtotime($berita['tanggal'])) ?></span>
        <span class="ah-sep">·</span>
        <span>👁 <?= number_format($berita['views'] ?? 0) ?> dibaca</span>
      </div>

      <!-- Judul -->
      <h1 class="ah-judul"><?= esc($berita['judul']) ?></h1>

      <!-- Thumbnail -->
      <div class="ah-thumb" style="background:<?= $bg ?>">
        <?php if (!$berita['thumbnail']): ?>
        <span class="ah-thumb-ic"><?= $ic ?></span>
        <?php endif; ?>
      </div>
    </div>

    <!-- Isi Artikel -->
    <div class="artikel-body reveal d1">
      <?php
      $isi = $berita['isi'] ?? '';
      if (strip_tags($isi) === $isi) {
          // Plain text — bungkus tiap baris jadi paragraf
          foreach (array_filter(explode("\n", trim($isi))) as $p) {
              echo '<p>'.esc(trim($p)).'</p>';
          }
      } else {
          // HTML dari editor
          echo $isi;
      }
      ?>
    </div>

    <!-- Tombol Share -->
    <div class="artikel-share reveal d2">
      <span class="share-label">Bagikan artikel ini:</span>
      <?php
      $shareUrl   = urlencode(current_url());
      $shareTitle = urlencode($berita['judul']);
      $shares = [
        ['💬','WhatsApp','https://wa.me/?text='.$shareTitle.'%20'.$shareUrl,     '#25D366'],
        ['📘','Facebook','https://facebook.com/sharer/sharer.php?u='.$shareUrl,  '#1877F2'],
        ['🐦','Twitter', 'https://twitter.com/intent/tweet?text='.$shareTitle.'&url='.$shareUrl,'#1DA1F2'],
      ];
      foreach ($shares as [$sic,$sname,$surl,$scolor]):
      ?>
      <a href="<?= $surl ?>" target="_blank" rel="noopener"
         class="share-btn"
         style="--sc:<?= $scolor ?>">
        <?= $sic ?> <?= $sname ?>
      </a>
      <?php endforeach; ?>
    </div>

    <!-- Berita Terkait -->
    <?php if (!empty($berita_terkait)): ?>
    <div class="terkait-wrap reveal d3">
      <div class="terkait-title">📎 Berita Terkait</div>
      <div class="terkait-list">
        <?php foreach ($berita_terkait as $b):
          $bic = $icons[$b['kategori']] ?? '📰';
          $bbg = $colors[$b['kategori']] ?? 'linear-gradient(135deg,var(--c1),var(--c3))';
        ?>
        <a href="<?= base_url('berita/'.$b['slug']) ?>" class="terkait-item">
          <div class="ti-thumb" style="background:<?= $bbg ?>">
            <span><?= $bic ?></span>
          </div>
          <div class="ti-body">
            <div class="ti-title"><?= esc($b['judul']) ?></div>
            <div class="ti-meta">📅 <?= date('d M Y', strtotime($b['tanggal'])) ?> · <?= esc($b['kategori']) ?></div>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>

  </article>

  <!-- ── SIDEBAR ──────────────────────────── -->
  <aside class="detail-sidebar">

    <!-- Kembali -->
    <a href="<?= base_url('berita') ?>" class="sidebar-back">
      ← Semua Berita
    </a>

    <!-- Info Artikel -->
    <div class="sidebar-card">
      <div class="sc-title">📋 Info Artikel</div>
      <div class="sc-rows">
        <div class="sc-row"><span>🏷 Kategori</span><strong><?= esc($berita['kategori']) ?></strong></div>
        <div class="sc-row"><span>📅 Tanggal</span><strong><?= date('d F Y', strtotime($berita['tanggal'])) ?></strong></div>
        <div class="sc-row"><span>👁 Dilihat</span><strong><?= number_format($berita['views'] ?? 0) ?> kali</strong></div>
        <div class="sc-row"><span>✍️ Sumber</span><strong>SDN 56 Prabumulih</strong></div>
      </div>
    </div>

    <!-- Widget PPDB -->
    <div class="sidebar-ppdb">
      <div class="sp-icon">✏️</div>
      <div class="sp-title">PPDB 2026/2027</div>
      <p class="sp-sub">Pendaftaran segera dibuka. Tempat terbatas!</p>
      <div class="sp-chips">
        <div class="sp-chip"><div class="spc-l">Dibuka</div><div class="spc-v">1 Apr 2026</div></div>
        <div class="sp-chip"><div class="spc-l">Ditutup</div><div class="spc-v">31 Mei 2026</div></div>
      </div>
      <a href="<?= base_url('ppdb') ?>" class="sp-btn">Daftar Sekarang →</a>
    </div>

    <!-- Berita Lainnya di Sidebar -->
    <?php if (!empty($berita_terkait)): ?>
    <div class="sidebar-card">
      <div class="sc-title">📰 Baca Juga</div>
      <?php foreach (array_slice($berita_terkait, 0, 3) as $b):
        $bic = $icons[$b['kategori']] ?? '📰';
      ?>
      <a href="<?= base_url('berita/'.$b['slug']) ?>" class="sb-item">
        <div class="sbi-ic"><?= $bic ?></div>
        <div>
          <div class="sbi-title"><?= esc(character_limiter($b['judul'], 60)) ?></div>
          <div class="sbi-date">📅 <?= date('d M Y', strtotime($b['tanggal'])) ?></div>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

  </aside>
</div>

<style>
/* ─── Breadcrumb ──────────────────────────────────── */
.breadcrumb-bar{background:var(--ink);padding:14px 64px;border-bottom:1px solid rgba(255,255,255,.06)}
.bc-inner{display:flex;align-items:center;gap:8px;flex-wrap:wrap;font-size:12px;max-width:1200px;margin:0 auto}
.bc-link{color:rgba(255,255,255,.4);text-decoration:none;transition:color .2s}
.bc-link:hover{color:var(--c3)}
.bc-sep{color:rgba(255,255,255,.2)}
.bc-active{color:var(--c3);font-weight:600}

/* ─── Layout ──────────────────────────────────────── */
.detail-layout{display:grid;grid-template-columns:1fr 340px;gap:32px;padding:48px 64px;background:var(--light);align-items:start;max-width:1400px;margin:0 auto;box-sizing:border-box}

/* ─── Artikel ─────────────────────────────────────── */
.artikel-wrap{min-width:0}

.artikel-header{background:var(--white);border-radius:20px;padding:36px;margin-bottom:20px;box-shadow:0 4px 24px rgba(0,96,100,.08)}
.ah-meta{display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:16px;font-size:12px;color:var(--gray)}
.ah-kat{background:var(--c5);color:var(--c1);font-size:11px;font-weight:800;padding:5px 14px;border-radius:100px;letter-spacing:1.2px;text-transform:uppercase}
.ah-sep{color:var(--c4)}
.ah-judul{font-family:'Cormorant Garamond',serif;font-size:clamp(22px,3.5vw,38px);font-weight:700;color:var(--ink);line-height:1.2;margin-bottom:24px}
.ah-thumb{height:300px;border-radius:14px;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden}
.ah-thumb-ic{font-size:88px;filter:drop-shadow(0 4px 16px rgba(0,0,0,.2))}

.artikel-body{background:var(--white);border-radius:20px;padding:36px;margin-bottom:20px;box-shadow:0 4px 24px rgba(0,96,100,.08);font-size:15px;color:var(--gray);line-height:1.9;word-break:break-word}
.artikel-body p{margin-bottom:1.4em}
.artikel-body p:last-child{margin-bottom:0}
.artikel-body h2,.artikel-body h3{font-family:'Cormorant Garamond',serif;color:var(--ink);margin:1.6em 0 .6em}
.artikel-body img{max-width:100%;border-radius:10px;margin:12px 0}
.artikel-body ul,.artikel-body ol{padding-left:1.4em;margin-bottom:1.2em}
.artikel-body li{margin-bottom:.4em}
.artikel-body blockquote{border-left:4px solid var(--c3);padding:12px 20px;background:var(--c5);border-radius:0 10px 10px 0;margin:1.2em 0;font-style:italic;color:var(--c1);font-weight:600}

.artikel-share{background:var(--white);border-radius:16px;padding:20px 28px;margin-bottom:20px;box-shadow:0 2px 12px rgba(0,96,100,.06);display:flex;align-items:center;gap:12px;flex-wrap:wrap}
.share-label{font-size:13px;font-weight:700;color:var(--ink);flex-shrink:0}
.share-btn{display:flex;align-items:center;gap:6px;padding:8px 16px;border-radius:10px;font-size:13px;font-weight:600;text-decoration:none;background:color-mix(in srgb,var(--sc) 12%,transparent);color:var(--sc);border:1.5px solid color-mix(in srgb,var(--sc) 25%,transparent);transition:all .2s}
.share-btn:hover{background:var(--sc);color:white}

.terkait-wrap{background:var(--white);border-radius:20px;padding:28px;box-shadow:0 4px 24px rgba(0,96,100,.08)}
.terkait-title{font-weight:700;font-size:16px;color:var(--ink);margin-bottom:18px}
.terkait-list{display:flex;flex-direction:column;gap:12px}
.terkait-item{display:flex;gap:14px;text-decoration:none;padding:12px;border-radius:12px;border:1.5px solid var(--light);transition:all .2s}
.terkait-item:hover{background:var(--c5);border-color:var(--c4)}
.ti-thumb{width:52px;height:52px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:26px;flex-shrink:0}
.ti-body{flex:1;min-width:0}
.ti-title{font-size:13px;font-weight:600;color:var(--ink);line-height:1.4;margin-bottom:4px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.ti-meta{font-size:11px;color:var(--gray)}

/* ─── Sidebar ─────────────────────────────────────── */
.detail-sidebar{position:sticky;top:80px;display:flex;flex-direction:column;gap:16px}

.sidebar-back{display:flex;align-items:center;gap:8px;padding:12px 18px;background:var(--white);border-radius:12px;border:2px solid var(--c4);color:var(--c1);font-size:13px;font-weight:700;text-decoration:none;transition:all .2s}
.sidebar-back:hover{background:var(--c5)}

.sidebar-card{background:var(--white);border-radius:16px;padding:22px;box-shadow:0 2px 12px rgba(0,96,100,.06)}
.sc-title{font-weight:800;font-size:13px;color:var(--ink);letter-spacing:.5px;margin-bottom:14px}
.sc-rows{display:flex;flex-direction:column}
.sc-row{display:flex;justify-content:space-between;align-items:center;padding:9px 0;border-bottom:1px solid var(--light);font-size:12px;color:var(--gray)}
.sc-row:last-child{border-bottom:none}
.sc-row strong{color:var(--ink);font-weight:700;text-align:right;max-width:55%}

.sidebar-ppdb{background:linear-gradient(135deg,var(--c1),#004D40);border-radius:16px;padding:22px;text-align:center;color:white}
.sp-icon{font-size:40px;margin-bottom:10px}
.sp-title{font-size:17px;font-weight:700;margin-bottom:6px}
.sp-sub{font-size:12px;color:rgba(255,255,255,.65);line-height:1.6;margin-bottom:14px}
.sp-chips{display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:14px}
.sp-chip{background:rgba(255,255,255,.1);border-radius:8px;padding:8px 6px;text-align:center}
.spc-l{font-size:10px;color:rgba(255,255,255,.55);font-weight:700;letter-spacing:.8px;text-transform:uppercase;margin-bottom:2px}
.spc-v{font-size:12px;font-weight:700}
.sp-btn{display:block;background:var(--gold);color:var(--ink);padding:11px;border-radius:10px;font-size:13px;font-weight:800;text-decoration:none;transition:opacity .2s}
.sp-btn:hover{opacity:.88}

.sb-item{display:flex;gap:12px;text-decoration:none;padding:10px 0;border-bottom:1px solid var(--light)}
.sb-item:last-child{border-bottom:none}
.sbi-ic{font-size:28px;flex-shrink:0;width:36px;text-align:center}
.sbi-title{font-size:12px;font-weight:600;color:var(--ink);line-height:1.4;margin-bottom:3px}
.sbi-date{font-size:11px;color:var(--gray)}

/* ─── Responsive ──────────────────────────────────── */
@media(max-width:1024px){
  .detail-layout{grid-template-columns:1fr;padding:32px 24px}
  .detail-sidebar{position:relative;top:0}
}
@media(max-width:600px){
  .breadcrumb-bar{padding:12px 16px}
  .detail-layout{padding:20px 16px}
  .artikel-header,.artikel-body,.terkait-wrap{padding:20px}
  .ah-thumb{height:200px}
  .ah-thumb-ic{font-size:60px}
}
</style>