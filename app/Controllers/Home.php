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

                ->where('status_publish', 1)

                ->groupStart()

                ->like('nama_sekolah', $keyword)

                ->orLike('kecamatan', $keyword)

                ->groupEnd()

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

            'sekolah' => $model
                ->where('status_publish', 1)
                ->findAll(),

            'totalSekolah' => $model
                ->where('status_publish', 1)
                ->countAllResults(),

            'totalTK' => $model
                ->where('status_publish', 1)
                ->where('jenjang', 'TK')
                ->countAllResults(),

            'totalSD' => $model
                ->where('status_publish', 1)
                ->where('jenjang', 'SD')
                ->countAllResults(),

            'totalSMP' => $model
                ->where('status_publish', 1)
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

            'sekolah' => $model
                ->where('status_publish', 1)
                ->findAll(),

            'totalSekolah' => $model
                ->where('status_publish', 1)
                ->countAllResults(),

            'totalTK' => $model
                ->where('status_publish', 1)
                ->where('jenjang', 'TK')
                ->countAllResults(),

            'totalSD' => $model
                ->where('status_publish', 1)
                ->where('jenjang', 'SD')
                ->countAllResults(),

            'totalSMP' => $model
                ->where('status_publish', 1)
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

            'sekolah' => $model
                ->where('status_publish', 1)
                ->findAll()

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

        $sekolah = $model

            ->where('status_publish', 1)

            ->find($id);

        // JIKA DATA TIDAK ADA
        if (!$sekolah) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('public/index', [

            'title' => $sekolah['nama_sekolah'],

            'sekolah' => $sekolah

        ]);
    }
}