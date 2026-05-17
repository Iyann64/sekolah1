<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengumuman Hasil PPDB - <?= esc($siswa['nama']) ?></title>
    <style>
        * { margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.4; background: #fff; font-size: 13px; padding: 15px; }
        
        /* Header */
        .header-title { text-align: center; margin-bottom: 15px; border-bottom: 3px solid #4caf50; padding-bottom: 10px; }
        .school-name { font-size: 14px; font-weight: bold; text-transform: uppercase; color: #333; }
        .header-subtitle { font-size: 12px; color: #666; margin-top: 2px; }
        .separator { height: 2px; background: #4caf50; margin: 8px 0; }
        
        /* Info table */
        .info-table { width: 100%; margin: 15px 0; border-collapse: collapse; }
        .info-table td { padding: 6px 8px; border-bottom: 1px solid #eee; vertical-align: top; }
        .info-table .label { width: 25%; font-weight: bold; color: #555; }
        .info-table .value { font-weight: 600; }
        
        /* Status box */
        .status-box { border: 2px solid #4caf50; border-radius: 8px; padding: 12px; margin: 15px 0; text-align: center; background: #f1f8e9; }
        .status-box .checkmark { font-size: 24px; color: #4caf50; margin-bottom: 5px; }
        .status-box .status-text { font-size: 14px; font-weight: bold; color: #4caf50; margin-bottom: 5px; }
        .status-box .subtitle { font-size: 12px; color: #666; }
        
        /* Section header */
        .section-header { font-weight: bold; color: #333; margin-top: 12px; margin-bottom: 8px; font-size: 12px; padding-bottom: 5px; border-bottom: 2px solid #ddd; }
        .section-header .icon { margin-right: 5px; }
        
        /* Jadwal section */
        .jadwal-item { margin: 6px 0 6px 20px; font-size: 12px; list-style: disc; }
        
        /* Warning box */
        .warning-box { border-left: 4px solid #ff9800; background: #fff3e0; padding: 8px 10px; margin: 10px 0; font-size: 11px; line-height: 1.3; }
        
        /* Dokumen list */
        .dokumen-list { margin: 8px 0 8px 20px; }
        .dokumen-item { margin: 4px 0; font-size: 12px; list-style: disc; }
        
        /* Footer */
        .footer-note { text-align: center; margin-top: 15px; padding-top: 10px; border-top: 1px solid #eee; font-size: 10px; color: #999; }
        
        /* Print styles */
        @media print {
            @page { margin: 0.5cm; }
            .no-print { display: none; }
            body { padding: 5px; }
        }
        
        .no-print { margin-top: 20px; text-align: center; }
        .btn { padding: 10px 20px; margin: 0 5px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; font-size: 12px; }
        .btn-print { background: #4caf50; color: white; }
        .btn-close { background: #ddd; color: #333; }
        .btn:hover { opacity: 0.9; }
    </style>
</head>
<body onload="window.print()">
    <!-- Header -->
    <div class="header-title">
        <div class="school-name"><?= esc($site_name) ?></div>
        <div class="header-subtitle">PENGUMUMAN HASIL SPMB 2026/2027</div>
        <div style="font-size: 11px; color: #999; margin-top: 3px;">Sistem Penerimaan Siswa Baru</div>
    </div>
    <div class="separator"></div>

    <!-- Student Info -->
    <table class="info-table">
        <tr>
            <td class="label">Nama Lengkap</td>
            <td class="value"><?= esc($siswa['nama']) ?></td>
        </tr>
        <tr>
            <td class="label">NIK</td>
            <td class="value"><?= esc($siswa['nik_siswa']) ?></td>
        </tr>
        <tr>
            <td class="label">Status</td>
            <td class="value"><span style="color: #4caf50; font-weight: bold;"><?= esc($siswa['status']) ?></span></td>
        </tr>
    </table>

    <!-- Status Result Box -->
    <div class="status-box">
        <div class="checkmark">✓</div>
        <div class="status-text"><?= esc($siswa['status']) ?></div>
        <div class="subtitle">Selamat! Anda dinyatakan <?= strtolower($siswa['status']) ?> sebagai siswa baru</div>
    </div>

    <!-- Jadwal Daftar Ulang -->
    <div class="section-header"><span class="icon">📌</span>Jadwal Daftar Ulang</div>
    <ul style="margin: 0; padding: 0;">
        <?php foreach ($jadwal as $j): ?>
            <li class="jadwal-item"><?= esc($j['jalur']) ?>: <?= date('d-m Y', strtotime($j['tgl_mulai'])) ?> - <?= date('d-m Y', strtotime($j['tgl_akhir'])) ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Warning -->
    <div class="warning-box">
        <strong>⚠ PERHATIAN:</strong> <?= esc($config['peringatan_daftar_ulang']) ?>
    </div>

    <!-- Dokumen Wajib -->
    <div class="section-header"><span class="icon">✓</span>Berkas Wajib Daftar Ulang</div>
    <ul style="margin: 0; padding: 0;">
        <?php foreach ($dokumen as $d): ?>
            <li class="dokumen-item"><?= esc($d['nama']) ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Important Note -->
    <div style="border: 2px solid #ff9800; border-radius: 5px; padding: 10px; margin: 15px 0; text-align: center; background: #fffbf0;">
        <div style="font-size: 12px; color: #ff9800; font-weight: bold;">📋 PENTING!</div>
        <div style="font-size: 12px; color: #ff6f00; margin-top: 3px;">SILAHKAN CETAK HASIL PENGUMUMAN INI</div>
    </div>

    <!-- Space for signature -->
    <div style="margin-top: 30px;">
        <div style="text-align: right; font-size: 12px; margin-bottom: 3px;">Prabumulih, <?= date('d F Y') ?></div>
        <div style="text-align: right; font-size: 11px; margin-top: 20px;">Panitia PPDB</div>
        <div style="text-align: right; font-size: 11px; margin-bottom: 30px;"><?= esc($site_name) ?></div>
        <div style="text-align: right; height: 40px;"></div>
        <div style="text-align: right; font-size: 11px;">( ............................................ )</div>
    </div>

    <!-- Footer -->
    <div class="footer-note">
        Pengumuman ini sah dikeluarkan oleh Panitia PPDB <?= esc($site_name) ?><br>
        Dicetak pada: <?= date('d/m/Y H:i:s') ?>
    </div>

    <!-- Print Buttons -->
    <div class="no-print">
        <button class="btn btn-print" onclick="window.print()">🖨️ CETAK / SIMPAN PDF</button>
        <button class="btn btn-close" onclick="window.close()">TUTUP</button>
    </div>
</body>
</html>