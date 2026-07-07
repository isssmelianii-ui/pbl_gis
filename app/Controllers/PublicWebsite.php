<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class PublicWebsite extends BaseController
{
    public function index()
    {
        $sekolahModel = new SekolahModel();

        // AMBIL ID DARI URL
        $id = $this->request->getGet('id');

        // JIKA ADA ID
        if ($id) {
            $sekolah = $sekolahModel->find($id);
        } else {
            // FALLBACK
            $sekolah = $sekolahModel->first();
        }

        // JIKA DATA TIDAK ADA
        if (!$sekolah) {
            $sekolah = [
                'id' => null,
                'nama_sekolah' => 'Sekolah Tidak Ditemukan',
                'npsn' => '',
                'jenjang' => '',
                'status_sekolah' => '',
                'akreditasi' => '',
                'kurikulum' => '',
                'kecamatan' => '',
                'alamat' => '',
                'visi' => '',
                'misi' => '',
                'logo' => '',
                'cover' => '',
                'foto' => '',
                'kepala_sekolah' => '',
                'nip_kepala' => '',
                'sambutan' => '',
                'latitude' => '-0.947083',
                'longitude' => '100.417181',
                'telepon' => '',
                'email' => '',
                'website' => ''
            ];
        }

        $data = ['sekolah' => $sekolah];
        return view('public/index', $data);
    }

     // ================== TAMBAHKAN METHOD INI ==================
  public function detail($id)
{
    $sekolahModel = new SekolahModel();
    $sekolah = $sekolahModel->find($id);

    if (!$sekolah) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    // ============================================
    // AMBIL SEKOLAH TERDEKAT (maksimal 5)
    // ============================================
    $sekolahTerdekat = [];
    if (!empty($sekolah['latitude']) && !empty($sekolah['longitude'])) {
        $sekolahTerdekat = $sekolahModel->getNearbySchools(
            $sekolah['latitude'],
            $sekolah['longitude'],
            5
        );
    }

    // ============================================
    // KIRIM KE VIEW
    // ============================================
    $data = [
        'sekolah'          => $sekolah,
        'sekolah_terdekat' => $sekolahTerdekat, // <-- INI PENTING!
    ];

    return view('public/index', $data);
}
}