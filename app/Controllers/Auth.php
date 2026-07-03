<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Jika sudah login, redirect ke landing atau dashboard
        if (session()->get('logged_in')) {
            // Jika belum pernah landing di session ini
            if (!session()->get('has_landed')) {
                return redirect()->to('/landing');
            }
            return redirect()->to($this->getDashboardRoute());
        }

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
                // dd($user);

                $sessionData = [
                    'logged_in' => true,
                    'id' => $user['id'],
                    'name' => $user['name'],           // ← TAMBAHKAN INI
                    'nama_pengguna' => $user['username'],
                    'role' => $user['role'],
                    'email' => $user['email'],
                    'foto' => $user['foto'] ?? 'avatar-default.png',
                    // Tambahkan flag untuk landing
                    'has_landed' => false, // Awalnya belum landing
                ];
                $session->set($sessionData);

                // Redirect ke landing page terlebih dahulu
                // Setelah landing selesai, baru redirect ke dashboard masing-masing
                return redirect()->to('/landing');

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

    /**
     * Get dashboard route based on user role
     */
    private function getDashboardRoute()
    {
        $role = session()->get('role');
        
        switch ($role) {
            case 'super_admin':
                return '/superadmin/dashboard';
            case 'operator':
                return '/admin/dashboard';
            default:
                return '/admin/dashboard';
        }
    }
}