<?php

namespace App\Models;

use CodeIgniter\Model;

class PpdbLaporanModel extends Model
{
    protected $table          = 'ppdb_laporan_tahunan';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $allowedFields  = [
        'tahun_ajaran', 'total_pendaftar', 'total_diterima', 'total_ditolak',
        'jalur_afirmasi', 'jalur_domisili', 'jalur_mutasi', 
        'laki_laki', 'perempuan', 'catatan_kepala'
    ];

    protected $useTimestamps  = true;

    /**
     * Mendapatkan tren pendaftaran untuk grafik di Dashboard Admin
     */
    public function getTrenTahunan(int $limit = 5)
    {
        return $this->orderBy('tahun_ajaran', 'ASC')
                    ->limit($limit)
                    ->findAll();
    }
}