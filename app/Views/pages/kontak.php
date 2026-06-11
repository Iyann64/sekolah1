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
            <a href="https://wa.me/+6282281463958" class="mc-btn mc-wa">💬 WhatsApp</a>
            <a href="tel:+6282281463958" class="mc-btn mc-tel">📞 Telepon</a>
        </div>

        <div class="k-items">
            <div class="k-row">
            <div class="k-icon">📍</div>
            <div>
                <div class="k-lbl">Alamat</div>
                <div class="k-val"><?= esc($site_address) ?></div>
                <div class="k-sub">Sumatera Selatan 31111, Indonesia</div>
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
                <div class="k-val"><a href="https://wa.me/+6282281463958">+62 822-8146-3958</a></div>
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

    </div>
    </section>