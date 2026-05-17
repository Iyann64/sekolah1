<?php

namespace App\Models;

use CodeIgniter\Model;

class PpdbJadwalModel extends Model
{
    protected $table          = 'ppdb_jadwal';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields  = ['jalur', 'tgl_mulai', 'tgl_akhir', 'keterangan', 'aktif'];

    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';
    protected $deletedField   = 'deleted_at';

    /**
     * Ambil semua jadwal yang aktif
     */
    public function getAktif()
    {
        return $this->where('aktif', true)->orderBy('tgl_mulai', 'ASC')->findAll();
    }

    /**
     * Ambil jadwal berdasarkan jalur
     */
    public function getByJalur(string $jalur)
    {
        return $this->where('jalur', $jalur)
                    ->where('aktif', true)
                    ->first();
    }
}
