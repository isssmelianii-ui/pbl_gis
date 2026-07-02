<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
public function login()
{
    return view('auth/login');
}



public function processLogin()
{
    $session = session();
    $model   = new UserModel();

    $email    = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $user = $model->where('email', $email)->first();

    // Debug
   
    if ($user) {

        if (password_verify($password, $user['password'])) {
//  dd($user);

            $sessionData = [
                    'logged_in' => true,
                    'id' => $user['id'],
                    'name' => $user['name'],           // ← TAMBAHKAN INI
                    'nama_pengguna' => $user['username'],
                    'role' => $user['role'],
                    'email' => $user['email'],
                    'foto'           => $user['foto'] ?? 'avatar-default.png',
                ];
                $session->set($sessionData);

            // SUPER ADMIN
            if ($user['role'] == 'super_admin') {
                
                return redirect()->to('/superadmin/dashboard');
            }

            // ADMIN / OPERATOR SEKOLAH
            if ($user['role'] == 'operator') {
            
                return redirect()->to('/admin/dashboard');
            }

        } else {

            return redirect()
                ->back()
                ->with('error', 'Password salah!');
        }

    } else {

        // Debug
        // dd("Email tidak ditemukan!");

        return redirect()
            ->back()
            ->with('error', 'Email tidak ditemukan!');
    }
}

public function logout()
{
    session()->destroy();

    return redirect()->to('/admin/login');
}



}