<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class Laporan extends BaseController
{
    public function index()
    {
        $model = new SekolahModel();

        $sekolah = $model->findAll();

        $totalSekolah = $model->countAll();

        $totalTK = $model
            ->where('jenjang', 'TK')
            ->countAllResults();

        $totalSD = $model
            ->where('jenjang', 'SD')
            ->countAllResults();

        $totalSMP = $model
            ->where('jenjang', 'SMP')
            ->countAllResults();

        return view('superadmin/laporan', [

            'sekolah' => $sekolah,
            'totalSekolah' => $totalSekolah,
            'totalTK' => $totalTK,
            'totalSD' => $totalSD,
            'totalSMP' => $totalSMP

        ]);
    }
}