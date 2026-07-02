<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $table = 'sekolah';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [

        'user_id',

        'nama_sekolah',
        'npsn',
        'jenjang',
        'kecamatan',
        'alamat',

        'status_sekolah',
        'akreditasi',
        'kurikulum',

        'telepon',
        'email',
        'website',

        'latitude',
        'longitude',

        'visi',
        'misi',

        'kepala_sekolah',
        'nip_kepala',
        'sambutan',
        'foto_kepala',

        'cover',
        'logo',
        'foto',

        'created_at',
        'updated_at'

    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';

}