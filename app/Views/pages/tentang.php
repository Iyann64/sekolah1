    <!-- ════════ TENTANG HERO ════════ -->
    <section class="hero" id="tentang" style="min-height:45vh">
    <div class="hero-grid"></div>
    <div class="orb1 hero-orb"></div>
    <div class="orb3 hero-orb"></div>
    <div class="hero-content" style="max-width:680px">
        <div class="hero-eyebrow"><?= esc($site_name) ?> · Prabumulih, Sumatera Selatan</div>
        <h1 style="font-size:clamp(32px,5vw,64px)">Tentang <span class="acc">Sekolah</span><br>Kami</h1>
        <p class="hero-sub">Mengenal lebih dekat SD Negeri 56 Prabumulih — sejarah, visi, misi, dan komitmen kami dalam mendidik generasi terbaik bangsa.</p>
    </div>
    </section>

    <!-- ════════ PROFIL SEKOLAH ════════ -->
    <section class="about" id="profil">
    <div class="about-visual reveal">
        <div class="av-bg">
        <img class="av-logo" src="<?= $logo_url ?>" alt="Logo <?= esc($site_name) ?>">
        </div>
       
    </div>
    <div class="reveal d1">
        <div class="tag">Profil Sekolah</div>
        <h2 class="sec-title">Profil SD Negeri 56<br><em>Prabumulih</em></h2>
        <p class="sec-sub">Berkomitmen penuh membentuk generasi penerus bangsa yang unggul, berkarakter, dan siap menghadapi tantangan abad ke-21.</p>
        <div class="vm-list">
        <div class="vm-card">
            <div class="vm-head"><span style="font-size:20px">🌟</span><span class="vm-lbl">Visi</span></div>
            <p class="vm-txt">Terwujudnya Siswa yang Berakhlak Mulia, Berprestasi, Kreatif, dan Berwawasan Global.</p>
        </div>
        <div class="vm-card">
            <div class="vm-head"><span style="font-size:20px">🎯</span><span class="vm-lbl">Misi</span></div>
            <p class="vm-txt">
            1. Menghayati ajaran agama yang dianut dan budaya bangsa sehingga menjadi sumber kearifan dalam bertindak serta mempertebal keimanan dan ketaqwaan.<br>
            2. Meningkatkan kompetensi tenaga pendidik dan kependidikan dalam mengolah pembelajaran menjadi sistem teknologi cyber di abad 21.<br>
            3. Membekali peserta didik dengan IMTAQ dan IPTEQ agar mampu bersaing dan melanjutkan ke jenjang pendidikan yang lebih tinggi.<br>
            4. Meningkatkan pembelajaran berbasis ICT dengan improvisasi serta siap bersaing di abad 21.<br>
            5. Mewujudkan dan meningkatkan kualitas akademi peserta didik yang memiliki kompetensi abad 21.<br>
            6. Menumbuhkan semangat keunggulan warga sekolah dalam bersaing di abad 21.<br>
            7. Meningkatkan hasil lulusan yang mampu bersaing di era revolusi 4.0.<br>
            8. Meningkatkan kebersihan, keindahan, kerindangan, dan kenyamanan di lingkungan sekolah.<br>
            9. Menumbuh kembangkan jiwa entrepreneurship peserta didik.<br>
            10. Mengoptimalkan pelaksanaan 9K dengan memperdayakan potensi yang ada di lingkungan sekolah.
            </p>
        </div>
        </div>
    </div>
    </section>

    <!-- ════════ IDENTITAS SEKOLAH ════════ -->
    <section style="background:var(--light)">
    <div style="text-align:center;margin-bottom:48px" class="reveal">
        <div class="tag">Identitas Sekolah</div>
        <h2 class="sec-title">Data <em>Pokok Sekolah</em></h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:16px;max-width:840px;margin:0 auto" class="reveal d1">
        <?php
        $identitas = [
        ['🏫','Nama Sekolah',   'SD Negeri 56 Prabumulih'],
        ['🔢','NPSN',           '10606345'],
        ['📍','Alamat',         'H7MC+HC8, Gn. Ibul, Kec. Prabumulih Timur, Kota Prabumulih'],
        ['🏙️','Kabupaten/Kota', 'Kota Prabumulih'],
        ['🗺️','Provinsi',      'Sumatera Selatan'],
        ['📮','Kode Pos',       '31111'],
        ['📞','Telepon',        '+62 822-8146-3958'],
        ['✉️','Email',          'sdn56prabumulih@gmail.com'],
        ['🎓','Status',         'Negeri'],
        ['⭐','Akreditasi',     'B (Baik) - BAN-S/M'],
        ];
        foreach ($identitas as [$ic, $lbl, $val]):
        ?>
        <div style="background:var(--white);border-radius:14px;padding:16px 20px;display:flex;align-items:center;gap:14px;border:1px solid rgba(0,188,212,.08);box-shadow:0 2px 12px rgba(0,96,100,.04)">
        <span style="font-size:24px;flex-shrink:0"><?= $ic ?></span>
        <div>
            <div style="font-size:11px;font-weight:700;color:var(--c2);letter-spacing:1px;text-transform:uppercase;margin-bottom:3px"><?= $lbl ?></div>
            <div style="font-size:14px;font-weight:600;color:var(--ink)"><?= esc($val) ?></div>
        </div>
        </div>
        <?php endforeach; ?>
    </div>
    </section>