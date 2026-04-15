    <!-- ════════ HERO ════════ -->
    <section class="hero" id="ppdb" style="min-height:45vh;padding:clamp(40px,8vw,80px) clamp(20px,6vw,64px)">
    <div class="hero-grid"></div>
    <div class="orb1 hero-orb"></div>
    <div class="orb2 hero-orb"></div>
    <div class="hero-content" style="max-width:680px">
        <div class="hero-eyebrow">Penerimaan Peserta Didik Baru 2026/2027</div>
        <h1 style="font-size:clamp(32px,5vw,64px)">PPDB <span class="acc">2026</span><br>SDN 56 Prabumulih</h1>
        <p class="hero-sub">Daftarkan putra-putri Anda dan bergabung bersama keluarga besar SD Negeri 56 Prabumulih. Tempat terbatas — segera daftar!</p>
        <div class="hero-btns">
        <a href="#form-daftar" class="btn-hero-p">✏️ Daftar Sekarang</a>
        <a href="#syarat"      class="btn-hero-s">📋 Lihat Persyaratan</a>
        </div>
    </div>
    </section>

    <!-- ════════ STATUS BANNER ════════ -->
    <?php
    $statusClass = [
    'Belum Dibuka'       => ['bg'=>'#FFF8E1','border'=>'#FFD600','color'=>'#F57F17','icon'=>'⏳'],
    'Sedang Berlangsung' => ['bg'=>'#E8F5E9','border'=>'#43A047','color'=>'#1B5E20','icon'=>'✅'],
    'Ditutup'            => ['bg'=>'#FFEBEE','border'=>'#EF5350','color'=>'#B71C1C','icon'=>'🔒'],
    ];
    $sc = $statusClass[$config['status']] ?? $statusClass['Belum Dibuka'];
    ?>
    <div style="background:<?= $sc['bg'] ?>;border-top:3px solid <?= $sc['border'] ?>;border-bottom:3px solid <?= $sc['border'] ?>;padding:clamp(12px,4vw,18px) clamp(16px,6vw,64px);text-align:center">
    <div style="font-size:clamp(12px,3vw,16px);font-weight:700;color:<?= $sc['color'] ?>">
        <?= $sc['icon'] ?> Status PPDB: <strong><?= esc($config['status']) ?></strong>
        &nbsp;·&nbsp; Pendaftaran: <strong><?= esc($config['tgl_buka']) ?> – <?= esc($config['tgl_tutup']) ?></strong>
    </div>
    </div>

    <!-- ════════ INFO CHIPS ════════ -->
    <section class="ppdb" style="padding:clamp(32px,8vw,64px) clamp(20px,6vw,64px)">
    <div class="ppdb-inner">
        <div class="tag">Informasi PPDB</div>
        <h2 class="sec-title">Informasi <em>Pendaftaran</em></h2>
        <p class="sec-sub">Pastikan putra-putri Anda memenuhi semua persyaratan berikut sebelum mendaftar.</p>
        <div class="ppdb-chips">
        <div class="ppdb-chip"><div class="pc-lbl">Dibuka</div><div class="pc-val"><?= esc($config['tgl_buka']) ?></div></div>
        <div class="ppdb-chip"><div class="pc-lbl">Ditutup</div><div class="pc-val"><?= esc($config['tgl_tutup']) ?></div></div>
        <div class="ppdb-chip"><div class="pc-lbl">Kuota</div><div class="pc-val"><?= esc($config['kuota']) ?></div></div>
        <div class="ppdb-chip"><div class="pc-lbl">Usia</div><div class="pc-val"><?= esc($config['usia']) ?></div></div>
        </div>
    </div>
    </section>

    <!-- ════════ SYARAT & KETENTUAN ════════ -->
    <section id="syarat" style="background:var(--light);padding:clamp(40px,8vw,80px) clamp(20px,6vw,64px)">
    <div style="text-align:center;margin-bottom:48px" class="reveal">
        <div class="tag">Persyaratan</div>
        <h2 class="sec-title">Syarat & <em>Ketentuan</em></h2>
        <p class="sec-sub" style="margin:0 auto">Dokumen dan persyaratan yang perlu disiapkan oleh calon peserta didik baru.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:clamp(16px,4vw,24px);max-width:900px;margin:0 auto;padding:0 clamp(16px,4vw,20px)">

        <!-- Syarat Usia -->
        <div class="card" style="background:var(--white);border-radius:18px;padding:28px;box-shadow:0 4px 24px rgba(0,96,100,.08)">
        <div style="font-size:32px;margin-bottom:12px">🎂</div>
        <div style="font-weight:700;font-size:16px;color:var(--ink);margin-bottom:12px">Persyaratan Usia</div>
        <ul style="list-style:none;display:flex;flex-direction:column;gap:10px">
            <li style="display:flex;gap:10px;font-size:14px;color:var(--gray)"><span style="color:var(--success);flex-shrink:0">✅</span>Minimal berusia <strong>6 tahun</strong> per 1 Juli 2026</li>
            <li style="display:flex;gap:10px;font-size:14px;color:var(--gray)"><span style="color:var(--success);flex-shrink:0">✅</span>Maksimal <strong>7 tahun</strong> per 1 Juli 2026</li>
            <li style="display:flex;gap:10px;font-size:14px;color:var(--gray)"><span style="color:var(--warning);flex-shrink:0">⚠️</span>Usia 8 tahun dengan <strong>rekomendasi khusus</strong></li>
        </ul>
        </div>

        <!-- Dokumen Wajib -->
        <div class="card" style="background:var(--white);border-radius:18px;padding:28px;box-shadow:0 4px 24px rgba(0,96,100,.08)">
        <div style="font-size:32px;margin-bottom:12px">📄</div>
        <div style="font-weight:700;font-size:16px;color:var(--ink);margin-bottom:12px">Dokumen Wajib</div>
        <ul style="list-style:none;display:flex;flex-direction:column;gap:10px">
            <?php foreach (['Akta Kelahiran (fotokopi)','Kartu Keluarga (fotokopi)','KTP/NIK Orang Tua/Wali','Kartu Imunisasi Anak','Surat Keterangan Sehat dari Dokter/Puskesmas','Foto 3×4 (4 lembar)','Ijazah / STTB TK (jika ada)','Surat Pernyataan dari Orang Tua/Wali'] as $dok): ?>
            <li style="display:flex;gap:10px;font-size:14px;color:var(--gray)"><span style="color:var(--c3);flex-shrink:0">📌</span><?= esc($dok) ?></li>
            <?php endforeach; ?>
        </ul>
        </div>

        <!-- Data Pribadi Siswa -->
        <div class="card" style="background:var(--white);border-radius:18px;padding:28px;box-shadow:0 4px 24px rgba(0,96,100,.08)">
        <div style="font-size:32px;margin-bottom:12px">👤</div>
        <div style="font-weight:700;font-size:16px;color:var(--ink);margin-bottom:12px">Data Pribadi Siswa</div>
        <ul style="list-style:none;display:flex;flex-direction:column;gap:10px">
            <?php foreach (['Nama Lengkap (sesuai akta kelahiran)','NISN (Nomor Induk Siswa Nasional)','NIK dari Akta Kelahiran','Jenis Kelamin','Agama & Kepercayaan','Tempat & Tanggal Lahir','Kewarganegaraan','Status Kesehatan (kondisi khusus jika ada)'] as $data): ?>
            <li style="display:flex;gap:10px;font-size:14px;color:var(--gray)"><span style="color:var(--c1);flex-shrink:0">✓</span><?= esc($data) ?></li>
            <?php endforeach; ?>
        </ul>
        </div>

        <!-- Data Orang Tua/Wali -->
        <div class="card" style="background:var(--white);border-radius:18px;padding:28px;box-shadow:0 4px 24px rgba(0,96,100,.08)">
        <div style="font-size:32px;margin-bottom:12px">👨‍👩‍👧</div>
        <div style="font-weight:700;font-size:16px;color:var(--ink);margin-bottom:12px">Data Orang Tua/Wali</div>
        <ul style="list-style:none;display:flex;flex-direction:column;gap:10px">
            <?php foreach (['Nama Orang Tua/Wali (lengkap)','NIK/KTP Orang Tua/Wali','Pekerjaan Orang Tua/Wali','Agama Orang Tua/Wali','Nomor Telepon/WhatsApp Aktif','Email Aktif','Alamat Lengkap & Kode Pos','Hubungan dengan Anak (Orang Tua/Wali)'] as $data): ?>
            <li style="display:flex;gap:10px;font-size:14px;color:var(--gray)"><span style="color:var(--c1);flex-shrink:0">✓</span><?= esc($data) ?></li>
            <?php endforeach; ?>
        </ul>
        </div>

        <!-- Alur Pendaftaran -->
        <div class="card" style="background:var(--white);border-radius:18px;padding:28px;box-shadow:0 4px 24px rgba(0,96,100,.08);grid-column:1/-1">
        <div style="font-size:32px;margin-bottom:12px">🗺️</div>
        <div style="font-weight:700;font-size:16px;color:var(--ink);margin-bottom:20px">Alur Pendaftaran</div>
        <div style="display:flex;gap:0;overflow-x:auto;padding-bottom:8px">
            <?php
            $alur = [
            ['1','Isi Form','Online / Datang langsung'],
            ['2','Upload Dokumen','Kirim berkas persyaratan'],
            ['3','Verifikasi','Tim kami memverifikasi data'],
            ['4','Pengumuman','Cek status penerimaan'],
            ['5','Daftar Ulang','Lengkapi administrasi'],
            ];
            foreach ($alur as $i => [$no,$judul,$desc]):
            $isLast = $i === count($alur)-1;
            ?>
            <div style="display:flex;align-items:center;gap:0;flex-shrink:0">
            <div style="text-align:center;min-width:120px">
                <div style="width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,var(--c1),var(--c3));color:white;font-weight:700;font-size:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 8px"><?= $no ?></div>
                <div style="font-weight:700;font-size:13px;color:var(--ink)"><?= $judul ?></div>
                <div style="font-size:11px;color:var(--gray);margin-top:3px;line-height:1.4"><?= $desc ?></div>
            </div>
            <?php if (!$isLast): ?>
            <div style="width:40px;height:2px;background:var(--c4);flex-shrink:0;margin-bottom:18px"></div>
            <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        </div>

    </div>
    </section>

    <!-- ════════ FORM PENDAFTARAN ════════ -->
    <section id="form-daftar" style="padding:clamp(40px,8vw,80px) clamp(20px,6vw,64px)">
    <div style="text-align:center;margin-bottom:48px" class="reveal">
        <div class="tag">Formulir Pendaftaran</div>
        <h2 class="sec-title">Daftar <em>Online</em> Sekarang</h2>
        <p class="sec-sub" style="margin:0 auto">Isi formulir di bawah ini dengan lengkap dan benar. Kami akan menghubungi Anda segera setelah data diverifikasi.</p>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
    <div style="max-width:720px;margin:0 auto 32px;background:#E8F5E9;border:1px solid #C8E6C9;border-left:4px solid #43A047;border-radius:14px;padding:20px 24px;text-align:center">
        <div style="font-size:36px;margin-bottom:8px">🎉</div>
        <div style="font-weight:700;font-size:16px;color:#1B5E20;margin-bottom:6px">Pendaftaran Berhasil Dikirim!</div>
        <div style="font-size:14px;color:#2E7D32"><?= session()->getFlashdata('success') ?></div>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <div style="max-width:720px;margin:0 auto 24px;background:#FFEBEE;border:1px solid #FFCDD2;border-left:4px solid #EF5350;border-radius:12px;padding:14px 20px;font-size:13px;color:#C62828">
        ⚠️ <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <div style="max-width:720px;margin:0 auto;background:var(--white);border-radius:20px;padding:clamp(24px,6vw,40px);box-shadow:0 8px 40px rgba(0,96,100,.1);border:1px solid rgba(0,188,212,.08)" class="reveal d1">

        <?php if ($config['status'] === 'Sedang Berlangsung'): ?>
        <form action="<?= base_url('ppdb/daftar') ?>" method="POST">
        <?= csrf_field() ?>

        <div style="font-weight:700;font-size:14px;color:var(--c1);letter-spacing:1px;text-transform:uppercase;margin-bottom:20px;padding-bottom:12px;border-bottom:2px solid var(--c5)">
            👤 Data Calon Siswa
        </div>
        <div class="form-row" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px">
            <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Nama Lengkap *</label>
            <input type="text" name="nama_lengkap" placeholder="Nama sesuai akta" value="<?= old('nama_lengkap') ?>" required
                    style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
            <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Tempat Lahir *</label>
            <input type="text" name="tempat_lahir" placeholder="Kota kelahiran" value="<?= old('tempat_lahir') ?>" required
                    style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
        </div>
        <div class="form-row" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-top:16px">
            <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Tanggal Lahir *</label>
            <input type="date" name="tgl_lahir" value="<?= old('tgl_lahir') ?>" required
                    style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
            <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Usia Saat Ini</label>
            <input type="number" name="usia" placeholder="Tahun" min="5" max="9" value="<?= old('usia') ?>"
                    style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
        </div>

        <div style="font-weight:700;font-size:14px;color:var(--c1);letter-spacing:1px;text-transform:uppercase;margin:28px 0 20px;padding-bottom:12px;border-bottom:2px solid var(--c5)">
            👨‍👩‍👧 Data Orang Tua / Wali
        </div>
        <div class="form-row" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px">
            <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Nama Orang Tua/Wali *</label>
            <input type="text" name="nama_ortu" placeholder="Nama lengkap" value="<?= old('nama_ortu') ?>" required
                    style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
            <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">No. Telepon/WhatsApp *</label>
            <input type="tel" name="telepon" placeholder="08xx-xxxx-xxxx" value="<?= old('telepon') ?>" required
                    style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
        </div>
        <div style="margin-top:16px">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Email Aktif *</label>
            <input type="email" name="email" placeholder="email@contoh.com" value="<?= old('email') ?>" required
                style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
        </div>

        <div style="font-weight:700;font-size:14px;color:var(--c1);letter-spacing:1px;text-transform:uppercase;margin:28px 0 20px;padding-bottom:12px;border-bottom:2px solid var(--c5)">
            🏫 Asal Sekolah
        </div>
        <div>
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Asal TK / PAUD</label>
            <input type="text" name="asal_sekolah" placeholder="Nama TK/PAUD (kosongkan jika belum pernah)" value="<?= old('asal_sekolah') ?>"
                style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
        </div>

        <div style="margin-top:12px;background:var(--c5);border-radius:10px;padding:12px 16px;font-size:12px;color:var(--c1);border-left:3px solid var(--c3)">
            ℹ️ Dengan mendaftar, Anda menyetujui bahwa data yang diisi adalah benar dan dapat dipertanggungjawabkan.
        </div>

        <button type="submit" class="btn-send" style="margin-top:24px;width:100%">✏️ Kirim Formulir Pendaftaran</button>
        </form>

        <?php else: ?>
        <div style="text-align:center;padding:40px 20px">
        <div style="font-size:56px;margin-bottom:16px">⏳</div>
        <div style="font-size:18px;font-weight:700;color:var(--ink);margin-bottom:8px">Pendaftaran <?= esc($config['status']) ?></div>
        <p style="font-size:14px;color:var(--gray);line-height:1.7;max-width:380px;margin:0 auto 24px">
            Pendaftaran PPDB akan dibuka pada <strong><?= esc($config['tgl_buka']) ?></strong> dan ditutup <strong><?= esc($config['tgl_tutup']) ?></strong>.
            Pantau terus website kami untuk informasi terbaru.
        </p>
        <a href="https://wa.me/<?= esc($site_wa) ?>" class="btn-hero-p" style="display:inline-flex;align-items:center;gap:8px;padding:12px 28px;background:linear-gradient(135deg,var(--c1),var(--c3));color:white;border-radius:12px;font-weight:700;font-size:14px">
            💬 Tanya via WhatsApp
        </a>
        </div>
        <?php endif; ?>

    </div>
    </section>