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

        'status_publish',

        'created_at',
        'updated_at'

    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';

    // ============================================
    // METHOD GET NEARBY SCHOOLS (HANYA SATU VERSI)
    // ============================================
    /**
     * Ambil sekolah terdekat berdasarkan koordinat menggunakan rumus Haversine
     * 
     * @param float $lat Latitude sekolah utama
     * @param float $lng Longitude sekolah utama
     * @param int $limit Jumlah maksimal sekolah yang ditampilkan (default 5)
     * @param int|null $excludeId ID sekolah yang akan dikecualikan (opsional)
     * @return array
     */
    public function getNearbySchools($lat, $lng, $limit = 5, $excludeId = null)
    {
        // Validasi koordinat
        if (empty($lat) || empty($lng)) {
            return [];
        }

        // Escape nilai untuk keamanan SQL
        $lat = (float) $lat;
        $lng = (float) $lng;
        $limit = (int) $limit;

        // Query menggunakan raw SQL dengan rumus Haversine
        $sql = "SELECT *, (
            6371 * acos(
                cos(radians(?)) 
                * cos(radians(latitude)) 
                * cos(radians(longitude) - radians(?)) 
                + sin(radians(?)) 
                * sin(radians(latitude))
            )
        ) AS jarak
        FROM sekolah
        WHERE latitude IS NOT NULL 
          AND longitude IS NOT NULL
          AND latitude != 0
          AND longitude != 0";

        // Tambahkan pengecualian jika ada ID yang harus dilewatkan
        if ($excludeId !== null) {
            $sql .= " AND id != ?";
        }

        $sql .= " ORDER BY jarak ASC LIMIT ?";

        // Siapkan parameter
        $params = [$lat, $lng, $lat];
        if ($excludeId !== null) {
            $params[] = $excludeId;
        }
        $params[] = $limit;

        // Eksekusi query
        $result = $this->db->query($sql, $params)->getResultArray();

        // Format jarak menjadi "X km" atau "X m"
        foreach ($result as &$row) {
            if (isset($row['jarak'])) {
                $jarakKm = (float) $row['jarak'];
                if ($jarakKm < 1) {
                    // Jika kurang dari 1 km, tampilkan dalam meter
                    $meter = round($jarakKm * 1000);
                    $row['jarak'] = $meter . ' m';
                } else {
                    $row['jarak'] = number_format($jarakKm, 1, ',', '.') . ' km';
                }
            } else {
                $row['jarak'] = '0 km';
            }
        }

        return $result;
    }
}