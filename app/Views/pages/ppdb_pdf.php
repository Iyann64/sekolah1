<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran - <?= esc($siswa['nama']) ?></title>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif, Arial; color: #1e3448; line-height: 1.6; padding: 40px; background: #fff; }
        .header { text-align: center; border-bottom: 3px double #006064; padding-bottom: 20px; margin-bottom: 30px; }
        .logo { width: 70px; height: 70px; margin-bottom: 10px; border-radius: 50%; }
        h2 { margin: 0; text-transform: uppercase; color: #006064; font-size: 22px; }
        .school-name { font-weight: 800; font-size: 18px; }
        .reg-num { font-size: 20px; font-weight: 800; color: #006064; margin: 20px 0; border: 2px dashed #00bcd4; display: inline-block; padding: 12px 24px; border-radius: 12px; background: #f0f7f8; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table td { padding: 10px 0; vertical-align: top; border-bottom: 1px solid #f0f7f8; }
        .label { width: 35%; font-weight: 700; color: #5c7a8a; font-size: 14px; }
        .val { font-size: 14px; font-weight: 600; }
        .footer { margin-top: 50px; font-size: 11px; color: #5c7a8a; text-align: center; border-top: 1px solid #eee; padding-top: 20px; }
        .stamp { margin-top: 30px; text-align: right; font-size: 14px; }
        @media print {
            .no-print { display: none; }
            body { padding: 0; }
            .reg-num { border: 2px dashed #006064; background: none !important; -webkit-print-color-adjust: exact; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <img src="<?= $logo_url ?>" class="logo" alt="Logo">
        <div class="school-name"><?= esc($site_name) ?></div>
        <h2>Bukti Pendaftaran PPDB 2026/2027</h2>
        <div style="font-size: 12px; color: #5c7a8a;"><?= esc($site_address) ?></div>
    </div>

    <div style="text-align: center;">
        <div class="reg-num">
            PPDB-<?= date('Ymd', strtotime($siswa['created_at'])) ?>-<?= str_pad($siswa['id'], 4, '0', STR_PAD_LEFT) ?>
        </div>
    </div>

    <table>
        <tr><td class="label">Nama Lengkap Siswa</td><td class="val">: <?= esc($siswa['nama']) ?></td></tr>
        <tr><td class="label">NIK Siswa</td><td class="val">: <?= esc($siswa['nik_siswa']) ?></td></tr>
        <tr><td class="label">NISN</td><td class="val">: <?= esc($siswa['nisn'] ?: '-') ?></td></tr>
        <tr><td class="label">Tempat, Tanggal Lahir</td><td class="val">: <?= esc($siswa['tempat_lahir']) ?>, <?= date('d F Y', strtotime($siswa['tgl_lahir'])) ?></td></tr>
        <tr><td class="label">Jenis Kelamin</td><td class="val">: <?= esc($siswa['jenis_kelamin']) ?></td></tr>
        <tr><td class="label">Agama</td><td class="val">: <?= esc($siswa['agama']) ?></td></tr>
        <tr><td class="label">Asal TK/PAUD</td><td class="val">: <?= esc($siswa['asal']) ?></td></tr>
        <tr><td colspan="2" style="padding-top: 20px; font-weight: 800; color: #006064; border-bottom: 2px solid #006064;">DATA ORANG TUA / WALI</td></tr>
        <tr><td class="label">Nama Orang Tua/Wali</td><td class="val">: <?= esc($siswa['nama_ortu']) ?></td></tr>
        <tr><td class="label">Hubungan</td><td class="val">: <?= esc($siswa['hubungan']) ?></td></tr>
        <tr><td class="label">No. Telepon/WhatsApp</td><td class="val">: <?= esc($siswa['telepon']) ?></td></tr>
        <tr><td class="label">Email Aktif</td><td class="val">: <?= esc($siswa['email']) ?></td></tr>
        <tr><td class="label">Alamat Lengkap</td><td class="val">: <?= esc($siswa['alamat']) ?></td></tr>
        <tr><td class="label">Status Pendaftaran</td><td class="val">: <span style="color: #00838f; font-weight: 800;"><?= esc($siswa['status']) ?></span></td></tr>
        <tr><td class="label">Waktu Pendaftaran</td><td class="val">: <?= date('d/m/Y H:i', strtotime($siswa['created_at'])) ?> WIB</td></tr>
    </table>

    <div style="margin-top: 30px; font-size: 13px; background: #f9f9f9; padding: 15px; border-radius: 8px;">
        <p style="margin-top: 0;"><strong>Instruksi Selanjutnya:</strong></p>
        <ol style="margin-bottom: 0; padding-left: 20px;">
            <li>Simpan cetakan bukti pendaftaran ini dengan baik.</li>
            <li>Bawa bukti ini beserta dokumen persyaratan asli saat jadwal verifikasi fisik di sekolah.</li>
            <li>Informasi jadwal verifikasi dan hasil seleksi akan dikirimkan melalui Email atau WhatsApp yang terdaftar.</li>
            <li>Anda dapat memantau status pendaftaran di menu <strong>Cek Status</strong> pada website resmi sekolah.</li>
        </ol>
    </div>

    <div class="stamp">
        Prabumulih, <?= date('d F Y') ?><br>
        Panitia PPDB SDN 56 Prabumulih<br>
        <br><br><br>
        ( ............................................ )
    </div>

    <div class="footer">
        Bukti ini sah dikeluarkan secara elektronik oleh sistem informasi <?= esc($site_name) ?>.<br>
        Dicetak pada: <?= date('d/m/Y H:i:s') ?>
    </div>

    <div class="no-print" style="margin-top: 40px; text-align: center;">
        <button onclick="window.print()" style="padding: 12px 24px; background: #006064; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 700; margin-right: 10px;">🖨️ CETAK / SIMPAN PDF</button>
        <button onclick="window.close()" style="padding: 12px 24px; background: #eee; color: #333; border: none; border-radius: 8px; cursor: pointer; font-weight: 700;">TUTUP</button>
    </div>
</body>
</html>