<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePpdbDokumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama'        => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => false],
            'deskripsi'   => ['type' => 'TEXT', 'null' => true],
            'wajib'       => ['type' => 'BOOLEAN', 'default' => true, 'comment' => 'Dokumen wajib atau opsional'],
            'urutan'      => ['type' => 'INT', 'constraint' => 11, 'default' => 0, 'comment' => 'Urutan tampilan'],
            'aktif'       => ['type' => 'BOOLEAN', 'default' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('urutan');
        $this->forge->addKey('aktif');
        $this->forge->createTable('ppdb_dokumen');

        // Insert data awal
        $dokumen = [
            ['nama' => 'Kartu Keluarga asli + fotocopy 2 lembar', 'urutan' => 1, 'wajib' => true],
            ['nama' => 'Akta Kelahiran asli + fotocopy 2 lembar', 'urutan' => 2, 'wajib' => true],
            ['nama' => 'Materai 2 buah', 'urutan' => 3, 'wajib' => true],
            ['nama' => 'Surat Keterangan Balita Sehat asli + fotocopy 2 lembar', 'urutan' => 4, 'wajib' => true],
            ['nama' => 'Ijazah TK (jika ada) fotocopy 2 lembar', 'urutan' => 5, 'wajib' => false],
            ['nama' => 'Kartu PIP/PKH (jika ada)', 'urutan' => 6, 'wajib' => false],
            ['nama' => 'Map kertas biola 2 buah (laki-laki biru dan perempuan kuning)', 'urutan' => 7, 'wajib' => true],
        ];

        foreach ($dokumen as $row) {
            $row['created_at'] = date('Y-m-d H:i:s');
            $row['updated_at'] = date('Y-m-d H:i:s');
            $row['aktif'] = true;
            $this->db->table('ppdb_dokumen')->insert($row);
        }
    }

    public function down()
    {
        $this->forge->dropTable('ppdb_dokumen');
    }
}
