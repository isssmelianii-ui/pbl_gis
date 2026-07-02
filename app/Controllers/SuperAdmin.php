<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class SuperAdmin extends BaseController
{
    public function dashboard()
    {
        $model = new SekolahModel();

        $sekolah = $model->findAll();

        $totalSekolah = count($sekolah);

        $totalTK = count(array_filter($sekolah, function($s){

            return $s['jenjang'] == 'TK';

        }));

        $totalSD = count(array_filter($sekolah, function($s){

            return $s['jenjang'] == 'SD';

        }));

        $totalSMP = count(array_filter($sekolah, function($s){

            return $s['jenjang'] == 'SMP';

        }));

        // DATA TERBARU

        $latestSekolah = $model
            ->orderBy('updated_at', 'DESC')
            ->findAll(5);

        return view('superadmin/dashboard', [

            'totalSekolah' => $totalSekolah,

            'totalTK' => $totalTK,

            'totalSD' => $totalSD,

            'totalSMP' => $totalSMP,

            'latestSekolah' => $latestSekolah

        ]);
    }
}