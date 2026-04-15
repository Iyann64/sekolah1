    <!-- ════════ HERO ════════ -->
    <section class="hero" id="kontak" style="min-height:40vh;padding:80px 64px">
    <div class="hero-grid"></div>
    <div class="orb2 hero-orb"></div>
    <div class="hero-content" style="max-width:600px">
        <div class="hero-eyebrow">Hubungi Kami</div>
        <h1 style="font-size:clamp(32px,5vw,64px)">Kontak &<br><span class="acc">Lokasi</span> Kami</h1>
        <p class="hero-sub">Kami senang mendengar dari Anda. Kunjungi langsung atau hubungi kami melalui salah satu saluran di bawah.</p>
    </div>
    </section>

    <!-- ════════ KONTAK & FORM ════════ -->
    <section class="kontak">
    <div class="kontak-layout">

        <!-- Kolom Kiri: Info Kontak -->
        <div class="reveal">
        <p style="font-size:16px;color:var(--gray);line-height:1.75;margin-bottom:32px">
            Jam operasional kantor sekolah: <strong>Senin – Jumat, 07.00 – 14.00 WIB</strong>.
            Di luar jam tersebut, Anda dapat menghubungi kami via WhatsApp.
        </p>

        <!-- Mobile quick contact -->
        <div class="mobile-cta">
            <a href="https://wa.me/<?= esc($site_wa) ?>" class="mc-btn mc-wa">💬 WhatsApp</a>
            <a href="tel:<?= esc($site_phone) ?>" class="mc-btn mc-tel">📞 Telepon</a>
        </div>

        <div class="k-items">
            <div class="k-row">
            <div class="k-icon">📍</div>
            <div>
                <div class="k-lbl">Alamat</div>
                <div class="k-val"><?= esc($site_address) ?></div>
                <div class="k-sub">Sumatera Selatan 31124, Indonesia</div>
            </div>
            </div>
            <div class="k-row">
            <div class="k-icon">📞</div>
            <div>
                <div class="k-lbl">Telepon</div>
                <div class="k-val"><a href="tel:<?= esc($site_phone) ?>"><?= esc($site_phone) ?></a></div>
                <div class="k-sub">Senin – Jumat · 07.00 – 14.00 WIB</div>
            </div>
            </div>
            <div class="k-row">
            <div class="k-icon">✉️</div>
            <div>
                <div class="k-lbl">Email</div>
                <div class="k-val"><a href="mailto:<?= esc($site_email) ?>"><?= esc($site_email) ?></a></div>
                <div class="k-sub">Respon dalam 1×24 jam kerja</div>
            </div>
            </div>
            <div class="k-row">
            <div class="k-icon">📱</div>
            <div>
                <div class="k-lbl">WhatsApp</div>
                <div class="k-val"><a href="https://wa.me/<?= esc($site_wa) ?>">0812-3456-7890</a></div>
                <div class="k-sub">Chat langsung dengan TU Sekolah</div>
            </div>
            </div>
        </div>

        <!-- Peta -->
        <a href="https://maps.google.com/?q=SD+Negeri+56+Prabumulih" target="_blank" class="map-box">
            <div class="map-inner">
            <div style="font-size:40px;margin-bottom:8px">🗺️</div>
            <div style="font-size:14px;font-weight:600">Peta Lokasi <?= esc($site_name) ?></div>
            <div style="font-size:12px;margin-top:4px;opacity:.7">Klik untuk buka Google Maps ↗</div>
            </div>
        </a>
        </div>

        <!-- Kolom Kanan: Form Pesan -->
        <div class="reveal d2">

        <?php if (session()->getFlashdata('success')): ?>
        <div class="form-ok" style="display:block;margin-bottom:20px">
            <div class="fok-ic">✅</div>
            <h4>Pesan Terkirim!</h4>
            <p><?= session()->getFlashdata('success') ?></p>
        </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
        <div style="background:#FFEBEE;border:1px solid #FFCDD2;border-left:4px solid #EF5350;border-radius:12px;padding:14px 18px;margin-bottom:20px;font-size:13px;color:#C62828">
            ⚠️ <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>

        <div class="form-title">Kirim Pesan</div>

        <form action="<?= base_url('kontak/kirim') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="form-row">
            <div class="fg">
                <label>Nama Lengkap *</label>
                <input type="text" name="nama" placeholder="Nama Anda" value="<?= old('nama') ?>" required>
            </div>
            <div class="fg">
                <label>No. Telepon</label>
                <input type="tel" name="telepon" placeholder="08xx-xxxx-xxxx" value="<?= old('telepon') ?>">
            </div>
            </div>
            <div class="fg">
            <label>Email *</label>
            <input type="email" name="email" placeholder="email@anda.com" value="<?= old('email') ?>" required>
            </div>
            <div class="fg">
            <label>Keperluan</label>
            <select name="topik">
                <option value="">Pilih keperluan...</option>
                <option value="ppdb"     <?= old('topik')==='ppdb'    ? 'selected':'' ?>>Informasi PPDB</option>
                <option value="program"  <?= old('topik')==='program' ? 'selected':'' ?>>Info Program Sekolah</option>
                <option value="pengaduan"<?= old('topik')==='pengaduan'?'selected':'' ?>>Pengaduan / Saran</option>
                <option value="kerjasama"<?= old('topik')==='kerjasama'?'selected':'' ?>>Kerjasama</option>
                <option value="lainnya"  <?= old('topik')==='lainnya' ? 'selected':'' ?>>Lainnya</option>
            </select>
            </div>
            <div class="fg">
            <label>Pesan *</label>
            <textarea name="pesan" placeholder="Tulis pesan Anda di sini..." required><?= old('pesan') ?></textarea>
            </div>
            <button type="submit" class="btn-send">📨 Kirim Pesan</button>
        </form>
        </div>

    </div>
    </section>