<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
            'nik'               => ['type' => 'VARCHAR', 'constraint' => 20],
            'nama'              => ['type' => 'VARCHAR', 'constraint' => 100],

            // Alamat Rumah Sekarang
            'rt'                => ['type' => 'VARCHAR', 'constraint' => 5, 'null' => true],
            'rw'                => ['type' => 'VARCHAR', 'constraint' => 5, 'null' => true],
            'kelurahan'         => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'kecamatan'         => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'kota'              => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'kode_pos'          => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => true],
            'provinsi'          => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],

            // Identitas
            'no_ktp'            => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'sim_a_b1_b2'       => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'sim_c'             => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'no_jamsostek'      => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'npwp'              => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'no_rekening'       => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],

            // Status dan Lainnya
            'telepon'           => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'jenis_kelamin'     => ['type' => 'ENUM', 'constraint' => ['pria', 'wanita'], 'default' => 'pria'],
            'warga_negara'      => ['type' => 'ENUM', 'constraint' => ['wni', 'wna'], 'default' => 'wni'],
            'agama'             => ['type' => 'ENUM', 'constraint' => ['islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghucu'], 'default' => 'islam'],
            'status_marital'    => ['type' => 'ENUM', 'constraint' => ['belum_nikah', 'nikah', 'janda', 'duda'], 'default' => 'belum_nikah'],

            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('calon_karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('calon_karyawan');
    }
}