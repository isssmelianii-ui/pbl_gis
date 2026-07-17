<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'username',
        'name',           // ← NAMA LENGKAP
        'email',
        'password',
        'role',
        'foto',           // ← TAMBAHKAN INI UNTUK FOTO
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
}