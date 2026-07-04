<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class Laporan extends BaseController
{
    public function index()
    {
        $model = new SekolahModel();

        // FILTER
        $jenjang   = $this->request->getGet('jenjang');
        $kecamatan = $this->request->getGet('kecamatan');

        // QUERY
        $query = $model;

        // FILTER JENJANG
        if($jenjang != '' && $jenjang != null){

            $query = $query->where('jenjang', $jenjang);

        }

        // FILTER KECAMATAN
        if($kecamatan != '' && $kecamatan != null){

            $query = $query->where('kecamatan', $kecamatan);

        }

        // DATA SEKOLAH
        $sekolah = $query->findAll();

        // TOTAL
        $totalSekolah = count($sekolah);

        $totalTK = count(array_filter($sekolah,function($s){

            return $s['jenjang'] == 'TK';

        }));

        $totalSD = count(array_filter($sekolah,function($s){

            return $s['jenjang'] == 'SD';

        }));

        $totalSMP = count(array_filter($sekolah,function($s){

            return $s['jenjang'] == 'SMP';

        }));

        return view('superadmin/laporan', [

            'sekolah'       => $sekolah,
            'totalSekolah' => $totalSekolah,
            'totalTK'       => $totalTK,
            'totalSD'       => $totalSD,
            'totalSMP'      => $totalSMP,
            'jenjang'       => $jenjang,
            'kecamatan'     => $kecamatan

        ]);
    }
}