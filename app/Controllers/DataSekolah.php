<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class DataSekolah extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | DATA SEKOLAH
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $model = new SekolahModel();

        // FILTER
        $keyword   = $this->request->getGet('keyword');
        $kecamatan = $this->request->getGet('kecamatan');
        $jenjang   = $this->request->getGet('jenjang');

        // QUERY
        $query = $model;

        // SEARCH
        if($keyword != ''){

            $query = $query
                ->groupStart()
                ->like('nama_sekolah', $keyword)
                ->orLike('kecamatan', $keyword)
                ->groupEnd();

        }

        // FILTER KECAMATAN
        if($kecamatan != ''){

            $query = $query
                ->where('kecamatan', $kecamatan);

        }

        // FILTER JENJANG
        if($jenjang != ''){

            $query = $query
                ->where('jenjang', $jenjang);

        }

        // DATA
        $sekolah = $query
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('superadmin/data_sekolah', [

            'sekolah'   => $sekolah,
            'keyword'   => $keyword,
            'kecamatan' => $kecamatan,
            'jenjang'   => $jenjang

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL SEKOLAH
    |--------------------------------------------------------------------------
    */

    public function detail($id)
    {
        $model = new SekolahModel();

        $sekolah = $model->find($id);

        // JIKA DATA TIDAK ADA
        if (!$sekolah) {

            return redirect()->to('/superadmin/data-sekolah')
            ->with('error', 'Sekolah tidak ditemukan');
        }

        // DEFAULT VALUE
        if (!isset($sekolah['nomor_sekolah'])) {

            $sekolah['nomor_sekolah'] = $sekolah['npsn'] ?? '-';
        }

        return view('superadmin/detail_sekolah', [

            'title'    => 'Detail Sekolah',

            'sekolah'  => $sekolah

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS SEKOLAH
    |--------------------------------------------------------------------------
    */

    public function hapus($id)
    {
        $model = new SekolahModel();

        $sekolah = $model->find($id);

        // CEK DATA
        if (!$sekolah) {

            return redirect()->to('/superadmin/data-sekolah')
            ->with('error', 'Data sekolah tidak ditemukan');
        }

        // HAPUS FOTO
        if (!empty($sekolah['foto'])) {

            $path = FCPATH . 'uploads/sekolah/' . $sekolah['foto'];

            if (file_exists($path)) {

                unlink($path);
            }
        }

        // HAPUS DATABASE
        $model->delete($id);

        return redirect()->to('/superadmin/data-sekolah')
        ->with('success', 'Data sekolah berhasil dihapus');
    }
}