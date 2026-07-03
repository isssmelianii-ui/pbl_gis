<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class PublicWebsite extends BaseController
{
    public function index()
    {
        $sekolahModel = new SekolahModel();
        
        // Ambil data sekolah berdasarkan user yang login
        // atau berdasarkan session
        $userId = session()->get('id');
        
        if ($userId) {
            // Jika user login, ambil sekolah berdasarkan user_id
            $sekolah = $sekolahModel->where('user_id', $userId)->first();
        } else {
            // Jika tidak login, ambil sekolah pertama (fallback)
            $sekolah = $sekolahModel->first();
        }
        
        // Jika belum ada data, buat array kosong
        if (!$sekolah) {
            $sekolah = [
                'id' => null,
                'nama_sekolah' => 'Sekolah Anda',
                'npsn' => '',
                'jenjang' => '',
                'status_sekolah' => '',
                'akreditasi' => '',
                'kurikulum' => '',
                'kecamatan' => '',
                'alamat' => '',
                'visi' => 'Belum diisi',
                'misi' => 'Belum diisi',
                'logo' => '',
                'cover' => '',
                'foto' => '',
                'kepala_sekolah' => 'Belum diisi',
                'nip_kepala' => '',
                'sambutan' => 'Belum diisi',
                'latitude' => '-0.947083',
                'longitude' => '100.417181',
                'telepon' => '',
                'email' => '',
                'website' => '',
                'user_id' => $userId,
            ];
        }
        
        $data = [
            'sekolah' => $sekolah,
        ];
        
        return view('public/index', $data);
    }
}