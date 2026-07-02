<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSekolah extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'nama_sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'npsn' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'nomor_sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],

            'website' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'jenjang' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],

            'alamat' => [
                'type' => 'TEXT',
            ],

            'kecamatan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'latitude' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],

            'longitude' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],

            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],

            'akreditasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
            ],

            'deskripsi' => [
                'type' => 'TEXT',
            ],

            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'created_by' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('sekolah');
    }

    public function down()
    {
        $this->forge->dropTable('sekolah');
    }
}