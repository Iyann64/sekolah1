<?php

namespace App\Models;

use CodeIgniter\Model;

class PpdbDokumenModel extends Model
{
    protected $table          = 'ppdb_dokumen';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields  = ['nama', 'deskripsi', 'wajib', 'urutan', 'aktif'];

    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';
    protected $deletedField   = 'deleted_at';

    /**
     * Ambil semua dokumen yang aktif, diurutkan
     */
    public function getDaftar()
    {
        return $this->where('aktif', true)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }

    /**
     * Ambil hanya dokumen wajib
     */
    public function getWajib()
    {
        return $this->where('aktif', true)
                    ->where('wajib', true)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }

    /**
     * Ambil hanya dokumen opsional
     */
    public function getOpsional()
    {
        return $this->where('aktif', true)
                    ->where('wajib', false)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }
}
