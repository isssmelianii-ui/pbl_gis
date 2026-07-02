<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [

            'name' => 'Super Admin',

            'email' => 'admin@gmail.com',

            'password' => password_hash('123456', PASSWORD_DEFAULT),

            'role' => 'super_admin'
        ];

        $this->db->table('users')->insert($data);
    }
}
