<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePpdbJadwal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'jalur'       => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'comment' => 'Nama jalur pendaftaran (Afirmasi, Domisili, dll)'],
            'tgl_mulai'   => ['type' => 'DATE', 'null' => false],
            'tgl_akhir'   => ['type' => 'DATE', 'null' => false],
            'keterangan'  => ['type' => 'TEXT', 'null' => true],
            'aktif'       => ['type' => 'BOOLEAN', 'default' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('jalur');
        $this->forge->addKey('aktif');
        $this->forge->createTable('ppdb_jadwal');

        // Insert data awal
        $data = [
            [
                'jalur'      => 'Afirmasi & Perpindahan Orang Tua',
                'tgl_mulai'  => '2026-05-11',
                'tgl_akhir'  => '2026-05-12',
                'keterangan' => 'Jalur Afirmasi & Perpindahan Orang Tua',
                'aktif'      => true,
            ],
            [
                'jalur'      => 'Domisili',
                'tgl_mulai'  => '2026-06-22',
                'tgl_akhir'  => '2026-06-23',
                'keterangan' => 'Jalur Domisili',
                'aktif'      => true,
            ],
        ];

        foreach ($data as $row) {
            $row['created_at'] = date('Y-m-d H:i:s');
            $row['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('ppdb_jadwal')->insert($row);
        }
    }

    public function down()
    {
        $this->forge->dropTable('ppdb_jadwal');
    }
}
