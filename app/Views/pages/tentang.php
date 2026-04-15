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
        <img class="av-logo" src="<?= base_url('images/logo.png') ?>" alt="Logo <?= esc($site_name) ?>">
        </div>
        <div class="av-badge"><div class="avb-n">A+</div><div class="avb-t">Akreditasi BAN-S/M</div></div>
        <div class="av-badge2"><div class="avb2-n">25+</div><div class="avb2-t">Tahun Berdiri</div></div>
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
        <div class="vm-card" style="border-left-color:var(--gold);background:#FFF8E1">
            <div class="vm-head"><span style="font-size:20px">🧭</span><span class="vm-lbl" style="color:var(--gold2)">Motto</span></div>
            <p class="vm-txt" style="font-family:'Cormorant Garamond',serif;font-size:18px;font-weight:700;color:var(--c1);font-style:italic">"Cerdas, Berkarakter, Berprestasi"</p>
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
        ['📍','Alamat',         'Jl. Padat Karya Kel. Gunung Ibul Kec. Prabumulih Timur'],
        ['🏙️','Kabupaten/Kota', 'Kota Prabumulih'],
        ['🗺️','Provinsi',      'Sumatera Selatan'],
        ['📮','Kode Pos',       '31124'],
        ['📞','Telepon',        '(0713) 123-4567'],
        ['✉️','Email',          'sdnegeri56pbm@gmail.com'],
        ['🎓','Status',         'Negeri'],
        ['⭐','Akreditasi',     'A (Unggul) – BAN-S/M 2024'],
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

    <!-- ════════ PRESTASI ════════ -->
    <section class="prestasi" id="prestasi">
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
    <section class="guru" id="guru">
    <div style="text-align:center;margin-bottom:48px" class="reveal">
        <div class="tag">Tenaga Pendidik</div>
        <h2 class="sec-title">Tim <em>Pengajar</em> Kami</h2>
        <p class="sec-sub" style="margin:0 auto">Guru-guru berpengalaman dan berdedikasi yang siap membimbing setiap siswa menuju potensi terbaiknya.</p>
    </div>
    <div class="guru-grid">
        <?php
        $gaColors = ['ga1','ga2','ga3','ga4','ga5'];
        if (!empty($guru_list)):
        foreach ($guru_list as $i => $g):
        ?>
        <div class="guru-card reveal <?= $i > 0 ? 'd'.min($i,4) : '' ?>">
        <div class="gc-av <?= $gaColors[$i % 5] ?>"><?= esc($g['avatar']) ?></div>
        <div class="gc-info">
            <div class="gc-name"><?= esc($g['nama']) ?></div>
            <div class="gc-role"><?= esc($g['jabatan']) ?></div>
            <div class="gc-nip">NIP: <?= esc($g['nip']) ?></div>
        </div>
        </div>
        <?php endforeach; else: ?>
        <!-- Fallback static data -->
        <div class="guru-card reveal">   <div class="gc-av ga1">👩‍💼</div><div class="gc-info"><div class="gc-name">Dra. Hj. Siti Rahayu</div><div class="gc-role">Kepala Sekolah</div><div class="gc-nip">NIP: 196805121992</div></div></div>
        <div class="guru-card reveal d1"><div class="gc-av ga2">👨‍🏫</div><div class="gc-info"><div class="gc-name">Budi Santoso, S.Pd</div><div class="gc-role">Guru Kelas 6A</div><div class="gc-nip">NIP: 197203181998</div></div></div>
        <div class="guru-card reveal d2"><div class="gc-av ga3">👩‍🏫</div><div class="gc-info"><div class="gc-name">Dewi Lestari, S.Pd</div><div class="gc-role">Guru Matematika</div><div class="gc-nip">NIP: 198504152010</div></div></div>
        <div class="guru-card reveal d3"><div class="gc-av ga4">👩‍🏫</div><div class="gc-info"><div class="gc-name">Rina Wati, S.Pd</div><div class="gc-role">Guru Bahasa Indonesia</div><div class="gc-nip">NIP: 198901202012</div></div></div>
        <div class="guru-card reveal d4"><div class="gc-av ga5">👨‍🏫</div><div class="gc-info"><div class="gc-name">Ahmad Fauzi, S.Pd</div><div class="gc-role">Guru PJOK</div><div class="gc-nip">NIP: 199002282015</div></div></div>
        <?php endif; ?>
    </div>
    </section>