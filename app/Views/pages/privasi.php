<section class="hero" style="min-height:30vh; background: var(--ink);">
    <div class="hero-content">
        <h1>Kebijakan<br><span class="acc">Privasi</span></h1>
        <p class="hero-sub">Informasi mengenai bagaimana kami mengelola dan melindungi data pribadi Anda.</p>
    </div>
</section>

<section style="background: var(--white); padding: 64px 20px;">
    <div style="max-width: 800px; margin: 0 auto; line-height: 1.8; color: var(--gray);">
        <p style="margin-bottom: 24px;">Terakhir diperbarui: <?= date('d F Y') ?></p>

        <h3 style="color: var(--ink); margin-bottom: 12px;">1. Informasi yang Kami Kumpulkan</h3>
        <p style="margin-bottom: 20px;">Kami mengumpulkan informasi yang Anda berikan secara langsung kepada kami melalui formulir pendaftaran PPDB Online dan formulir Kontak, termasuk namun tidak terbatas pada: Nama lengkap, NIK, alamat, nomor telepon, dan dokumen kependudukan.</p>

        <h3 style="color: var(--ink); margin-bottom: 12px;">2. Penggunaan Informasi</h3>
        <p style="margin-bottom: 10px;">Informasi yang kami kumpulkan digunakan untuk:</p>
        <ul style="margin-bottom: 20px; padding-left: 20px; list-style-type: disc;">
            <li>Memproses pendaftaran siswa baru (PPDB).</li>
            <li>Menghubungi orang tua/wali murid terkait keperluan administrasi sekolah.</li>
            <li>Memberikan informasi atau pengumuman resmi dari sekolah.</li>
        </ul>

        <h3 style="color: var(--ink); margin-bottom: 12px;">3. Perlindungan Data</h3>
        <p style="margin-bottom: 20px;">Kami berkomitmen untuk menjaga keamanan data pribadi Anda. Kami menerapkan prosedur fisik, elektronik, dan manajerial yang ketat untuk mencegah akses yang tidak sah dan menjaga keamanan data pendaftar.</p>

        <h3 style="color: var(--ink); margin-bottom: 12px;">4. Berbagi Informasi dengan Pihak Ketiga</h3>
        <p style="margin-bottom: 20px;">Sekolah tidak akan menjual, menyewakan, atau memberikan data pribadi Anda kepada pihak ketiga untuk tujuan komersial. Data hanya diberikan kepada instansi pendidikan terkait (seperti Dinas Pendidikan) sesuai dengan regulasi pemerintah.</p>

        <h3 style="color: var(--ink); margin-bottom: 12px;">5. Persetujuan</h3>
        <p style="margin-bottom: 20px;">Dengan menggunakan website kami dan mengisi formulir yang tersedia, Anda menyatakan setuju dengan Kebijakan Privasi ini.</p>

        <div style="margin-top: 40px; padding: 20px; background: var(--c5); border-radius: 12px;">
            <h4 style="color: var(--c1); margin-bottom: 8px;">Pertanyaan?</h4>
            <p style="font-size: 14px;">Jika Anda memiliki pertanyaan tentang kebijakan privasi ini, silakan hubungi kami melalui halaman kontak atau kirim email ke: <strong><?= esc($site_email) ?></strong></p>
        </div>
    </div>
</section>

<style>
    .hero-content h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 48px;
        color: white;
    }
    .hero-content .acc {
        color: var(--c3);
    }
    .hero-sub {
        color: rgba(255,255,255,0.7);
        margin-top: 10px;
    }
</style>