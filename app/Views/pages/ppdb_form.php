    <!-- ════════ HERO ════════ -->
    <section class="hero" id="ppdb-form" style="min-height:30vh;padding:clamp(40px,8vw,60px) clamp(20px,6vw,64px); background: var(--ink);">
    <div class="hero-grid"></div>
    <div class="hero-content" style="max-width:680px">
        <div class="hero-eyebrow">Formulir Pendaftaran Online</div>
        <h1 style="font-size:clamp(28px,4vw,48px)">Lengkapi Data <span class="acc">Calon Siswa</span></h1>
    </div>
    </section>

    <section style="padding:clamp(40px,8vw,80px) clamp(20px,6vw,64px); background: var(--light)">
    
    <?php if (session()->getFlashdata('error')): ?>
    <div style="max-width:720px;margin:0 auto 24px;background:#FFEBEE;border:1px solid #FFCDD2;border-left:4px solid #EF5350;border-radius:12px;padding:14px 20px;font-size:13px;color:#C62828">
        ⚠️ <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <div id="wrapper-form" style="max-width:720px;margin:0 auto;background:var(--white);border-radius:20px;padding:clamp(24px,6vw,40px);box-shadow:0 8px 40px rgba(0,96,100,.1);border:1px solid rgba(0,188,212,.08)">

        <!-- Instruksi Dokumen -->
        <?php if (!empty($dokumen)): ?>
        <div style="background:#E3F2FD;border-left:4px solid #1976D2;padding:14px 16px;border-radius:8px;margin-bottom:24px">
            <div style="font-weight:700;color:#1976D2;font-size:13px;margin-bottom:8px">📋 Dokumen yang Harus Disiapkan:</div>
            <ul style="margin:0;padding-left:20px;font-size:12px;color:#0D47A1;line-height:1.6">
                <?php foreach ($dokumen as $d): ?>
                <li><?= esc($d['nama']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('ppdb/daftar') ?>" method="POST" enctype="multipart/form-data">
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
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">NIK Siswa *</label>
            <input type="text" name="nik_siswa" placeholder="Sesuai Akta/KK" value="<?= old('nik_siswa') ?>" required
                    style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
        </div>
        <div class="form-row" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-top:16px">
            <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">NISN (Jika ada)</label>
            <input type="text" name="nisn" placeholder="Nomor Induk Siswa Nasional" value="<?= old('nisn') ?>"
                    style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
            <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Jenis Kelamin *</label>
            <select name="jenis_kelamin" required style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none;background:white">
                <option value="">Pilih...</option>
                <option value="Laki-laki" <?= old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
            </div>
        </div>
        <div class="form-row" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-top:16px">
            <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Tempat Lahir *</label>
            <input type="text" name="tempat_lahir" placeholder="Kota kelahiran" value="<?= old('tempat_lahir') ?>" required
                    style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
            <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Agama *</label>
            <select name="agama" required style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none;background:white">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Khonghucu">Khonghucu</option>
            </select>
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
        <div class="form-row" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-top:16px">
            <div class="fg" style="margin-bottom:0">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Kewarganegaraan</label>
                <input type="text" name="kewarganegaraan" value="<?= old('kewarganegaraan', 'WNI') ?>"
                        style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
            <div class="fg" style="margin-bottom:0">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Kondisi Kesehatan</label>
                <input type="text" name="status_kesehatan" placeholder="Alergi/Penyakit (jika ada)" value="<?= old('status_kesehatan') ?>"
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
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">NIK Orang Tua/Wali *</label>
                <input type="text" name="nik_ortu" placeholder="16 digit NIK" value="<?= old('nik_ortu') ?>" required
                        style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
        </div>
        <div class="form-row" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-top:16px">
            <div class="fg" style="margin-bottom:0">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Pekerjaan</label>
                <input type="text" name="pekerjaan_ortu" placeholder="Contoh: Karyawan Swasta" value="<?= old('pekerjaan_ortu') ?>"
                        style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
            <div class="fg" style="margin-bottom:0">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Agama Orang Tua/Wali *</label>
                <select name="agama_ortu" required style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none;background:white">
                    <option value="">Pilih...</option>
                    <option value="Islam" <?= old('agama_ortu') == 'Islam' ? 'selected' : '' ?>>Islam</option>
                    <option value="Kristen" <?= old('agama_ortu') == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                    <option value="Katolik" <?= old('agama_ortu') == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                    <option value="Hindu" <?= old('agama_ortu') == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                    <option value="Budha" <?= old('agama_ortu') == 'Budha' ? 'selected' : '' ?>>Budha</option>
                    <option value="Khonghucu" <?= old('agama_ortu') == 'Khonghucu' ? 'selected' : '' ?>>Khonghucu</option>
                </select>
            </div>
        </div>
        <div class="form-row" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-top:16px">
            <div class="fg" style="margin-bottom:0">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Hubungan *</label>
                <select name="hubungan" required style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none;background:white">
                    <option value="Ayah" <?= old('hubungan') == 'Ayah' ? 'selected' : '' ?>>Ayah</option>
                    <option value="Ibu" <?= old('hubungan') == 'Ibu' ? 'selected' : '' ?>>Ibu</option>
                    <option value="Wali" <?= old('hubungan') == 'Wali' ? 'selected' : '' ?>>Wali</option>
                </select>
            </div>
        </div>
        <div class="form-row" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-top:16px">
            <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">No. Telepon/WhatsApp *</label>
            <input type="tel" name="telepon" placeholder="08xx-xxxx-xxxx" value="<?= old('telepon') ?>" required
                    style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
            <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Email Aktif *</label>
            <input type="email" name="email" placeholder="email@contoh.com" value="<?= old('email') ?>" required
                style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
        </div>
        <div style="margin-top:16px">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Alamat Lengkap *</label>
            <textarea name="alamat" placeholder="Jl. Nama Jalan, No Rumah, RT/RW, Kelurahan, Kecamatan" required
                style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none;min-height:80px;margin-bottom:16px"><?= old('alamat') ?></textarea>
        </div>
        <div class="fg" style="margin-bottom:0">
            <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Kode Pos</label>
            <input type="text" name="kode_pos" placeholder="5 digit kode pos" value="<?= old('kode_pos') ?>"
                    style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
        </div>

        <div style="font-weight:700;font-size:14px;color:var(--c1);letter-spacing:1px;text-transform:uppercase;margin:28px 0 20px;padding-bottom:12px;border-bottom:2px solid var(--c5)">
            🏫 Jalur & Asal Sekolah
        </div>
        <div class="form-row" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px">
            <div class="fg">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Jalur Pendaftaran *</label>
                <select name="jalur_pendaftaran" required style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none;background:white">
                    <option value="">Pilih Jalur...</option>
                    <option value="Afirmasi" <?= old('jalur_pendaftaran') == 'Afirmasi' ? 'selected' : '' ?>>Afirmasi</option>
                    <option value="Mutasi Kerja Orang Tua" <?= old('jalur_pendaftaran') == 'Mutasi Kerja Orang Tua' ? 'selected' : '' ?>>Mutasi Kerja Orang Tua</option>
                    <option value="Domisili" <?= old('jalur_pendaftaran') == 'Domisili' ? 'selected' : '' ?>>Domisili</option>
                </select>
            </div>
            <div class="fg">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Asal TK / PAUD</label>
                <input type="text" name="asal_sekolah" placeholder="Nama TK/PAUD (opsional)" value="<?= old('asal_sekolah') ?>"
                    style="width:100%;padding:11px 14px;border:2px solid var(--c5);border-radius:10px;font-size:13px;color:var(--ink);outline:none">
            </div>
        </div>

        <div style="font-weight:700;font-size:14px;color:var(--c1);letter-spacing:1px;text-transform:uppercase;margin:28px 0 20px;padding-bottom:12px;border-bottom:2px solid var(--c5)">
            📁 Unggah Dokumen Persyaratan
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
            <div class="fg">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Akta Kelahiran *</label>
                <input type="file" name="file_akta" required
                    style="width:100%;padding:8px;font-size:12px;border:2px dashed var(--c4);border-radius:10px">
            </div>
            <div class="fg">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Kartu Keluarga *</label>
                <input type="file" name="file_kk" required
                    style="width:100%;padding:8px;font-size:12px;border:2px dashed var(--c4);border-radius:10px">
            </div>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:16px">
            <div class="fg">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">KTP Orang Tua * (PDF/JPG, Max 5MB)</label>
                <input type="file" name="file_ktp_ortu" required
                    style="width:100%;padding:8px;font-size:12px;border:2px dashed var(--c4);border-radius:10px">
            </div>
            <div class="fg">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Pas Foto Siswa 3x4 * (JPG/PNG, Max 5MB)</label>
                <input type="file" name="file_foto_siswa" required
                    style="width:100%;padding:8px;font-size:12px;border:2px dashed var(--c4);border-radius:10px">
            </div>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:16px">
            <div class="fg">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Kartu Imunisasi * (PDF/JPG)</label>
                <input type="file" name="file_imunisasi" required
                    style="width:100%;padding:8px;font-size:12px;border:2px dashed var(--c4);border-radius:10px">
            </div>
            <div class="fg">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Surat Ket. Sehat * (PDF/JPG)</label>
                <input type="file" name="file_surat_sehat" required
                    style="width:100%;padding:8px;font-size:12px;border:2px dashed var(--c4);border-radius:10px">
            </div>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:16px">
            <div class="fg">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Ijazah TK (Opsional)</label>
                <input type="file" name="file_ijazah_tk"
                    style="width:100%;padding:8px;font-size:12px;border:2px dashed var(--c4);border-radius:10px">
            </div>
            <div class="fg">
                <label style="display:block;font-size:13px;font-weight:700;color:var(--ink);margin-bottom:6px">Surat Pernyataan * (PDF/JPG)</label>
                <input type="file" name="file_pernyataan" required
                    style="width:100%;padding:8px;font-size:12px;border:2px dashed var(--c4);border-radius:10px">
            </div>
        </div>

        <div style="margin-top:12px;background:var(--c5);border-radius:10px;padding:12px 16px;font-size:12px;color:var(--c1);border-left:3px solid var(--c3)">
            ℹ️ Dengan mendaftar, Anda menyetujui bahwa data yang diisi adalah benar dan dapat dipertanggungjawabkan.
        </div>

        <?php if ($config['status'] === 'Sedang Berlangsung'): ?>
        <button type="submit" class="btn-send" style="margin-top:24px;width:100%">✏️ Kirim Formulir Pendaftaran</button>
        <?php else: ?>
        <div style="margin-top:24px;background:#f5f5f5;color:#888;padding:16px;border-radius:12px;text-align:center;font-weight:700;font-size:14px;border:2px dashed #ddd">
            🔒 Pendaftaran <?= esc($config['status']) ?>
        </div>
        <?php endif; ?>

        </form>
    </div>
    </section>