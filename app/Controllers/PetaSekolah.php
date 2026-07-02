<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class PetaSekolah extends BaseController
{
    public function index()
    {
        $model = new SekolahModel();

        $sekolah = $model->findAll();

        return view('superadmin/peta', [

            'sekolah' => $sekolah

        ]);
    }
}