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
        <a href="<?= base_url('ppdb/daftar') ?>" class="btn-hero-p">✏️ Daftar Sekarang</a>
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
        <div class="ppdb-chip"><div class="pc-lbl">Usia</div><div class="pc-val"><?= esc($config['usia_text']) ?></div></div>
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

    <!-- ════════ CEK STATUS ════════ -->
    <section id="cek-status" style="background:var(--c5);padding:40px 20px">
        <div style="max-width:720px;margin:0 auto;text-align:center">
            <div class="tag">Cek Pendaftaran</div>
            <h2 style="font-size:24px;margin-bottom:16px">Cek Status <em>Penerimaan</em></h2>
            <form action="<?= base_url('ppdb/cek-status') ?>" method="GET" style="display:flex;gap:10px;justify-content:center;margin-bottom:20px">
                <input type="text" name="nik" placeholder="Masukkan 16 digit NIK Siswa" required 
                    style="padding:12px 20px;border-radius:12px;border:2px solid var(--c4);width:100%;max-width:300px;outline:none">
                <button type="submit" class="btn-hero-p" style="padding:10px 24px;border-radius:12px">🔍 Cari</button>
            </form>

            <?php if (session()->getFlashdata('error_cek')): ?>
                <p style="color:#C62828;font-size:14px">⚠️ <?= session()->getFlashdata('error_cek') ?></p>
            <?php endif; ?>

            <?php if (isset($siswa)): ?>
                <div style="background:white;padding:24px;border-radius:16px;text-align:left;box-shadow:0 4px 20px rgba(0,0,0,0.05)">
                    <h4 style="margin-bottom:12px;color:var(--c1)">Hasil Pencarian:</h4>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;font-size:14px">
                        <div>Nama Siswa:</div><strong><?= esc($siswa['nama']) ?></strong>
                        <div>NIK:</div><strong><?= esc($siswa['nik_siswa']) ?></strong>
                        <div>Status:</div>
                        <div>
                            <?php 
                            $badgeColor = [
                                'Menunggu' => ['bg' => '#FFF8E1', 'text' => '#F57F17'],
                                'Diterima' => ['bg' => '#E8F5E9', 'text' => '#2E7D32'],
                                'Ditolak'  => ['bg' => '#FFEBEE', 'text' => '#C62828'],
                            ];
                            $bc = $badgeColor[$siswa['status']];
                            ?>
                            <span style="background:<?= $bc['bg'] ?>;color:<?= $bc['text'] ?>;padding:4px 12px;border-radius:100px;font-weight:700">
                                <?= esc($siswa['status']) ?>
                            </span>
                        </div>
                    </div>
                    <div style="margin-top:20px; border-top:1px solid #eee; padding-top:15px; display:grid; grid-template-columns:1fr 1fr; gap:10px;">
                        <?php 
                        $pesanTanya = "Halo Admin PPDB, saya ingin bertanya mengenai pendaftaran atas nama " . $siswa['nama'] . " (NIK: " . $siswa['nik_siswa'] . ") yang berstatus: " . $siswa['status'];
                        $waLink = "https://api.whatsapp.com/send?phone=" . $site_wa . "&text=" . urlencode($pesanTanya);
                        ?>
                        <a href="<?= $waLink ?>" target="_blank" class="btn-hero-s" style="padding:10px; border-radius:10px; font-size:13px; text-align:center; color:#25D366; border-color:#25D366;">
                            💬 Tanya Admin
                        </a>
                        <a href="<?= base_url('ppdb/cetak/'.$siswa['id']) ?>" target="_blank" class="btn-hero-p" style="padding:10px; border-radius:10px; font-size:13px; text-align:center;">
                            🖨️ Cetak Bukti Pendaftaran
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Floating Check Button (Mobile) -->
    <div id="floatingCheck" style="position: fixed; bottom: 80px; right: 20px; z-index: 99; display: none;">
        <a href="#cek-status" class="btn-hero-p" style="border-radius: 50px; padding: 12px 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
            🔍 Cek Status
        </a>
    </div>

    <script>
    // Otomatis jalankan saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (isset($siswa)): ?>
            // Scroll halus ke bagian cek status
            document.getElementById('cek-status').scrollIntoView({ behavior: 'smooth' });
        <?php endif; ?>

        // 2. Tampilkan tombol floating saat scroll ke bawah (untuk mobile)
        window.addEventListener('scroll', function() {
            const floatBtn = document.getElementById('floatingCheck');
            if (window.scrollY > 500 && window.innerWidth < 640) {
                floatBtn.style.display = 'block';
            } else {
                floatBtn.style.display = 'none';
            }
        });
    });
    </script>