<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class Home extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | LANDING PAGE
    |--------------------------------------------------------------------------
    */

public function index()
{
    $model = new SekolahModel();

    $keyword = $this->request->getGet('keyword');

    // JIKA ADA PENCARIAN
    if ($keyword) {

        $sekolah = $model

            ->like('nama_sekolah', $keyword)

            ->orLike('kecamatan', $keyword)

            ->first();

        // JIKA DATA DITEMUKAN
        if ($sekolah) {

            return redirect()->to(
                base_url('detail-sekolah/' . $sekolah['id'])
            );
        }

        // JIKA TIDAK DITEMUKAN
        session()->setFlashdata(
            'error',
            'Sekolah tidak ditemukan'
        );
    }

    $data = [

        'sekolah' => $model->findAll(),

        'totalSekolah' => $model->countAll(),

        'totalTK' => $model
            ->where('jenjang', 'TK')
            ->countAllResults(),

        'totalSD' => $model
            ->where('jenjang', 'SD')
            ->countAllResults(),

        'totalSMP' => $model
            ->where('jenjang', 'SMP')
            ->countAllResults(),

    ];

    return view('index', $data);
}

    /*
    |--------------------------------------------------------------------------
    | DATA SEKOLAH
    |--------------------------------------------------------------------------
    */

    public function dataSekolah()
    {
        $model = new SekolahModel();

        return view('landing/data_sekolah', [

            'sekolah' => $model->findAll(),

            'totalSekolah' => $model->countAll(),

            'totalTK' => $model
                ->where('jenjang', 'TK')
                ->countAllResults(),

            'totalSD' => $model
                ->where('jenjang', 'SD')
                ->countAllResults(),

            'totalSMP' => $model
                ->where('jenjang', 'SMP')
                ->countAllResults()

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | PETA PUBLIK
    |--------------------------------------------------------------------------
    */

    public function detailPeta()
    {
        $model = new SekolahModel();

        return view('landing/detail_peta', [

            'sekolah' => $model->findAll()

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL SEKOLAH
    |--------------------------------------------------------------------------
    */

    public function detailSekolah($id)
    {
        $model = new SekolahModel();

        $sekolah = $model->find($id);

        if (!$sekolah) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('public/index', [

            'title' => $sekolah['nama_sekolah'],

            'sekolah' => $sekolah

        ]);
    }
}