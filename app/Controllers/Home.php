<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class Home extends BaseController
{
public function index()
{
    $model = new SekolahModel();

    $data = [
        'sekolah'     => $model->findAll(),
        'totalSekolah'=> $model->countAll(),
        'totalTK'     => $model->where('jenjang','TK')->countAllResults(),
        'totalSD'     => $model->where('jenjang','SD')->countAllResults(),
        'totalSMP'    => $model->where('jenjang','SMP')->countAllResults(),
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

            'sekolah'       => $model->findAll(),

            'totalSekolah'  => $model->countAll(),

            'totalTK'       => $model->where('jenjang','TK')->countAllResults(),

            'totalSD'       => $model->where('jenjang','SD')->countAllResults(),

            'totalSMP'      => $model->where('jenjang','SMP')->countAllResults()

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | PETA SEMUA SEKOLAH
    |--------------------------------------------------------------------------
    */

    public function detailPeta()
    {
        $model = new SekolahModel();

        return view('landing/detail_peta',[

            'sekolah'=>$model->findAll()

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | WEBSITE SEKOLAH
    |--------------------------------------------------------------------------
    */

    public function detailSekolah($id)
    {
        $model = new SekolahModel();

        $sekolah = $model->find($id);

        if(!$sekolah){

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }

        return view('public/detail_sekolah',[

            'title'=>$sekolah['nama_sekolah'],

            'sekolah'=>$sekolah

        ]);
    }

}