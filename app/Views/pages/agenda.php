  <!-- ════════ HERO ════════ -->
  <section class="hero" id="agenda" style="min-height:40vh">
    <div class="hero-grid"></div>
    <div class="orb1 hero-orb"></div>
    <div class="orb2 hero-orb"></div>
    <div class="hero-content">
      <div class="hero-eyebrow">SD Negeri 56 Prabumulih · Kalender Sekolah</div>
      <h1>Agenda &<br><span class="acc">Kegiatan</span></h1>
      <p class="hero-sub">Jadwal kegiatan, acara, dan kalender akademik SD Negeri 56 Prabumulih.</p>
    </div>
    <div class="hero-scroll"><div class="scroll-line"></div><span>Scroll</span></div>
  </section>

  <!-- ════════ FILTER BULAN ════════ -->
  <div style="background:var(--white);padding:16px 64px;border-bottom:1px solid rgba(0,188,212,.08);position:sticky;top:64px;z-index:90">
    <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;max-width:1200px;margin:0 auto">
      <span style="font-size:12px;font-weight:800;color:var(--gray);letter-spacing:1px;text-transform:uppercase">Bulan:</span>
      <?php
      // Tampilkan 6 bulan ke depan sebagai filter
      for ($i = 0; $i < 6; $i++):
        $bln     = date('Y-m', strtotime("+$i month"));
        $label   = date('M Y', strtotime("+$i month"));
        $isAktif = $bln === $bulan_aktif;
      ?>
      <a href="<?= base_url('agenda?bulan='.$bln) ?>"
        style="padding:7px 16px;border-radius:100px;font-size:13px;font-weight:600;text-decoration:none;transition:all .2s;
                background:<?= $isAktif ? 'var(--c1)' : 'var(--light)' ?>;
                color:<?= $isAktif ? 'white' : 'var(--ink)' ?>;
                border:2px solid <?= $isAktif ? 'var(--c1)' : 'var(--c4)' ?>">
        <?= $label ?>
      </a>
      <?php endfor; ?>
    </div>
  </div>

  <!-- ════════ KONTEN ════════ -->
  <div style="display:grid;grid-template-columns:1fr 340px;gap:32px;padding:48px 64px;background:var(--light);max-width:1400px;margin:0 auto;box-sizing:border-box">

    <!-- Kiri: Daftar agenda bulan ini -->
    <div>
      <div style="font-size:18px;font-weight:700;color:var(--ink);margin-bottom:24px">
        📅 Agenda <?= date('F Y', strtotime($bulan_aktif.'-01')) ?>
      </div>

      <?php if (empty($agenda_semua)): ?>
      <div style="text-align:center;padding:80px 20px;background:var(--white);border-radius:18px">
        <div style="font-size:56px;margin-bottom:16px">📭</div>
        <div style="font-size:18px;font-weight:700;color:var(--ink);margin-bottom:8px">Tidak ada agenda</div>
        <p style="font-size:14px;color:var(--gray)">Belum ada agenda untuk bulan ini.</p>
      </div>

      <?php else:
        $katColors = [
          'Akademik'   => ['bg'=>'var(--c1)',   'icon'=>'📚'],
          'PPDB'       => ['bg'=>'#2E7D32',     'icon'=>'✏️'],
          'Rapat'      => ['bg'=>'var(--gold2)','icon'=>'🤝'],
          'Upacara'    => ['bg'=>'#C62828',     'icon'=>'🎌'],
          'Olahraga'   => ['bg'=>'#6A1B9A',     'icon'=>'⚽'],
          'Keagamaan'  => ['bg'=>'#E65100',     'icon'=>'🕌'],
          'Lainnya'    => ['bg'=>'#546E7A',     'icon'=>'📌'],
        ];
      ?>
      <div style="display:flex;flex-direction:column;gap:12px">
        <?php foreach ($agenda_semua as $ag):
          $kat  = $katColors[$ag['kategori']] ?? $katColors['Lainnya'];
          $lewat = strtotime($ag['tanggal']) < strtotime(date('Y-m-d'));
        ?>
        <div style="background:var(--white);border-radius:16px;padding:20px 24px;
                    display:flex;gap:20px;align-items:center;
                    box-shadow:0 2px 12px rgba(0,96,100,.06);
                    border:1.5px solid <?= $lewat ? 'var(--light)' : 'rgba(0,188,212,.1)' ?>;
                    opacity:<?= $lewat ? '.55' : '1' ?>">

          <!-- Tanggal badge -->
          <div style="background:<?= $kat['bg'] ?>;border-radius:12px;padding:10px 14px;text-align:center;flex-shrink:0;min-width:52px">
            <div style="font-size:22px;font-weight:800;color:white;line-height:1"><?= date('d', strtotime($ag['tanggal'])) ?></div>
            <div style="font-size:11px;color:rgba(255,255,255,.8);font-weight:700;letter-spacing:.5px"><?= date('M', strtotime($ag['tanggal'])) ?></div>
          </div>

          <!-- Info -->
          <div style="flex:1;min-width:0">
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px">
              <span style="background:var(--c5);color:var(--c1);font-size:10px;font-weight:800;padding:3px 10px;border-radius:100px;letter-spacing:.8px;text-transform:uppercase">
                <?= $kat['icon'] ?> <?= esc($ag['kategori']) ?>
              </span>
              <?php if ($lewat): ?>
              <span style="font-size:10px;color:var(--gray);font-weight:600">Selesai</span>
              <?php elseif (date('Y-m-d', strtotime($ag['tanggal'])) === date('Y-m-d')): ?>
              <span style="background:#E8F5E9;color:#2E7D32;font-size:10px;font-weight:800;padding:3px 10px;border-radius:100px">● Hari Ini</span>
              <?php endif; ?>
            </div>
            <div style="font-size:15px;font-weight:700;color:var(--ink);margin-bottom:4px"><?= esc($ag['judul']) ?></div>
            <div style="font-size:12px;color:var(--gray);display:flex;gap:16px;flex-wrap:wrap">
              <?php if ($ag['waktu']): ?><span>🕐 <?= date('H.i', strtotime($ag['waktu'])) ?> WIB</span><?php endif; ?>
              <?php if ($ag['tempat']): ?><span>📍 <?= esc($ag['tempat']) ?></span><?php endif; ?>
            </div>
            <?php if (!empty($ag['deskripsi'])): ?>
            <p style="font-size:12px;color:var(--gray);margin-top:6px;line-height:1.6"><?= esc($ag['deskripsi']) ?></p>
            <?php endif; ?>
          </div>

          <!-- Status dot -->
          <div style="width:10px;height:10px;border-radius:50%;background:<?= $lewat ? 'var(--c4)' : $kat['bg'] ?>;flex-shrink:0"></div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>

    <!-- Kanan: Sidebar agenda aktif mendatang -->
    <aside style="position:sticky;top:80px">

      <!-- Agenda Mendatang -->
      <div style="background:var(--white);border-radius:16px;padding:22px;box-shadow:0 2px 12px rgba(0,96,100,.06);margin-bottom:16px">
        <div style="font-weight:800;font-size:13px;color:var(--ink);margin-bottom:16px">🗓 Agenda Mendatang</div>
        <?php if (!empty($agenda_aktif)):
          $agColors = ['var(--c1)','var(--gold2)','#2E7D32','#C62828','#1565C0'];
          foreach ($agenda_aktif as $i => $ag): ?>
        <div style="display:flex;gap:12px;align-items:center;padding:10px 0;border-bottom:1px solid var(--light)">
          <div style="background:<?= $agColors[$i % 5] ?>;border-radius:8px;padding:6px 10px;text-align:center;flex-shrink:0">
            <div style="font-size:16px;font-weight:800;color:white;line-height:1"><?= date('d', strtotime($ag['tanggal'])) ?></div>
            <div style="font-size:10px;color:rgba(255,255,255,.8);font-weight:700"><?= date('M', strtotime($ag['tanggal'])) ?></div>
          </div>
          <div>
            <div style="font-size:13px;font-weight:600;color:var(--ink);line-height:1.35"><?= esc($ag['judul']) ?></div>
            <div style="font-size:11px;color:var(--gray);margin-top:3px"><?= esc($ag['tempat'] ?? '') ?></div>
          </div>
        </div>
        <?php endforeach; else: ?>
        <p style="font-size:13px;color:var(--gray);text-align:center;padding:20px 0">Tidak ada agenda mendatang.</p>
        <?php endif; ?>
      </div>

      <!-- PPDB Widget -->
      <div style="background:linear-gradient(135deg,var(--c1),#004D40);border-radius:16px;padding:22px;text-align:center;color:white">
        <div style="font-size:36px;margin-bottom:10px">✏️</div>
        <div style="font-size:16px;font-weight:700;margin-bottom:6px">PPDB 2026/2027</div>
        <p style="font-size:12px;color:rgba(255,255,255,.65);line-height:1.6;margin-bottom:14px">Pendaftaran segera dibuka. Jangan sampai ketinggalan!</p>
        <a href="<?= base_url('ppdb') ?>" style="display:block;background:var(--gold);color:var(--ink);padding:10px;border-radius:10px;font-size:13px;font-weight:800;text-decoration:none">
          Daftar Sekarang →
        </a>
      </div>

    </aside>
  </div>

  <style>
  @media(max-width:900px){
    div[style*="grid-template-columns:1fr 340px"]{
      grid-template-columns:1fr !important;
      padding:24px 16px !important;
    }
    aside{position:relative !important;top:0 !important}
  }
  </style>