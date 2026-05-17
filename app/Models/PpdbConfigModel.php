<?php

namespace App\Models;

use CodeIgniter\Model;

class PpdbConfigModel extends Model
{
    protected $table          = 'ppdb_config';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';

    protected $allowedFields  = ['kunci', 'nilai', 'tipe', 'deskripsi'];

    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    /**
     * Ambil nilai konfigurasi berdasarkan kunci
     * @param string $kunci Kunci konfigurasi
     * @param mixed $default Nilai default jika tidak ditemukan
     */
    public function get(string $kunci, $default = null)
    {
        $row = $this->where('kunci', $kunci)->first();
        return $row ? $row['nilai'] : $default;
    }

    /**
     * Ambil semua konfigurasi sebagai array asosiatif
     */
    public function getAll(): array
    {
        $config = [];
        $rows = $this->findAll();
        foreach ($rows as $row) {
            $config[$row['kunci']] = $row['nilai'];
        }
        return $config;
    }

    /**
     * Set nilai konfigurasi
     */
    public function updateConfig(string $kunci, $nilai): bool
    {
        $row = $this->where('kunci', $kunci)->first();
        if ($row) {
            return $this->update($row['id'], ['nilai' => $nilai]);
        }
        return false;
    }
}
