<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class DataSekolah extends BaseController
{
    public function index()
    {
        $model = new SekolahModel();

        $sekolah = $model
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('superadmin/data_sekolah', [

            'sekolah' => $sekolah

        ]);
    }

    public function detail($id)
{
    $model = new \App\Models\SekolahModel();
    $sekolah = $model->find($id);
    
    // Pastikan data ditemukan
    if (!$sekolah) {
        return redirect()->to('/superadmin/data-sekolah')->with('error', 'Sekolah tidak ditemukan');
    }
    
    // Tambahkan default value jika kolom tidak ada
    if (!isset($sekolah['nomor_sekolah'])) {
        $sekolah['nomor_sekolah'] = $sekolah['npsn'] ?? '-';
    }

    return view('superadmin/detail_sekolah', [
        'title' => 'Detail Sekolah',
        'sekolah' => $sekolah
    ]);
}
}