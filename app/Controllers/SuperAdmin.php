<?php

namespace App\Controllers;

use App\Models\SekolahModel;
use App\Models\UserModel;

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

public function pengaturan()
{
    $userModel = new UserModel();

    $user = $userModel->find(session()->get('id'));

    return view('superadmin/pengaturan', [
        'user' => $user
    ]);
}
public function updatePengaturan()
{
    $userModel = new UserModel();

    $id = session()->get('id');

    $name       = $this->request->getPost('name');
    $email      = $this->request->getPost('email');
    $password   = $this->request->getPost('password');
    $konfirmasi = $this->request->getPost('konfirmasi');

    // ==========================
    // Cek email sudah dipakai?
    // ==========================

    $cekEmail = $userModel
        ->where('email', $email)
        ->where('id !=', $id)
        ->first();

    if ($cekEmail) {

        return redirect()->back()->with(
            'error',
            'Email sudah digunakan oleh akun lain.'
        );

    }

    // ==========================
    // Cek password sama atau tidak
    // ==========================

    if (!empty($password)) {

        if ($password != $konfirmasi) {

            return redirect()->back()->with(
                'error',
                'Konfirmasi password tidak sama.'
            );

        }

    }

    // ==========================
    // Data yang akan diupdate
    // ==========================

    $data = [

        'name'  => $name,

        'email' => $email

    ];

    if (!empty($password)) {

        $data['password'] =
            password_hash($password, PASSWORD_DEFAULT);

    }

    // ==========================
    // Update database
    // ==========================

    $userModel->update($id, $data);

    // ==========================
    // Update session
    // ==========================

    session()->set([

        'name'  => $name,

        'email' => $email

    ]);

    return redirect()->back()->with(
        'success',
        'Pengaturan akun berhasil diperbarui.'
    );
}

}