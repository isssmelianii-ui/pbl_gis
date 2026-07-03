<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landing extends BaseController
{
    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin/login');
        }

        // Cek apakah sudah melewati landing page di session ini
        if (session()->get('has_landed')) {
            // Jika sudah landing, redirect ke dashboard sesuai role
            return redirect()->to($this->getDashboardRoute());
        }

        // Set session bahwa user sedang di landing
        session()->set('is_landing', true);

        // Ambil data user dari session
        $userName = session()->get('name') ?? session()->get('nama_pengguna') ?? 'Operator';
        $userRole = session()->get('role') ?? 'operator';

        // Format role untuk ditampilkan
        $roleDisplay = $this->formatRole($userRole);

        $data = [
            'title' => 'Selamat Datang',
            'user_name' => $userName,
            'role' => $roleDisplay,
            'role_raw' => $userRole,
            'app_name' => 'Sistem Informasi Sekolah',
            'logo' => base_url('assets/uploads/logo/logo.png')
        ];

        return view('landing/index', $data);
    }

    public function processLanding()
    {
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return $this->response->setJSON(['redirect' => '/admin/login']);
        }

        // Set session bahwa user sudah melewati landing
        session()->set('has_landed', true);
        session()->remove('is_landing');

        // Redirect ke dashboard sesuai role
        return $this->response->setJSON([
            'redirect' => $this->getDashboardRoute()
        ]);
    }

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

    private function formatRole($role)
    {
        switch ($role) {
            case 'super_admin':
                return 'Super Administrator';
            case 'operator':
                return 'Operator Sekolah';
            default:
                return ucfirst(str_replace('_', ' ', $role));
        }
    }
}