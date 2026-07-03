<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class Admin extends BaseController
{
    // ============================================
    // DASHBOARD
    // ============================================
    public function dashboard()
    {
        $sekolahModel = new SekolahModel();
        $userId = session()->get('id');
        $sekolah = $sekolahModel->where('user_id', $userId)->first();

        // Hitung progress kelengkapan
        $items = [
            'nama_sekolah' => $sekolah['nama_sekolah'] ?? null,
            'visi'         => $sekolah['visi'] ?? null,
            'misi'         => $sekolah['misi'] ?? null,
            'kepala_sekolah' => $sekolah['kepala_sekolah'] ?? null,
            'alamat'       => $sekolah['alamat'] ?? null,
            'koordinat'    => $sekolah['koordinat'] ?? null,
        ];

        $totalItems = count($items);
        $filledItems = 0;
        foreach ($items as $item) {
            if (!empty($item)) $filledItems++;
        }

        $progress = ($totalItems > 0) ? round(($filledItems / $totalItems) * 100) : 0;

        $data = [
            'title'          => 'Dashboard Operator',
            'subtitle'       => 'Kelola data sekolah Anda',
            'active_menu'    => 'dashboard',
            'total_sekolah'  => $sekolah ? 1 : 0,
            'profil_lengkap' => $progress,
            'progress'       => $progress,
            'total_item'     => $totalItems,
            'item_terisi'    => $filledItems,
            'sekolah'        => $sekolah,
        ];

        return view('admin/dashboard', $data);
    }

    // ============================================
    // PROFIL SEKOLAH - UPDATE
    // ============================================
    public function updateProfil()
    {
        $sekolahModel = new SekolahModel();
        $userId = session()->get('id');
        $sekolah = $sekolahModel->where('user_id', $userId)->first();

        // Validasi
        $rules = [
            'nama_sekolah' => 'required|min_length[3]',
            'alamat'       => 'permit_empty',
            'npsn'         => 'permit_empty',
            'jenjang'      => 'permit_empty',
            'status_sekolah' => 'permit_empty',
            'akreditasi'   => 'permit_empty',
            'kurikulum'    => 'permit_empty',
            'kecamatan'    => 'permit_empty',
            'telepon'      => 'permit_empty',
            'email'        => 'permit_empty|valid_email',
            'website'      => 'permit_empty|valid_url',
            'latitude'     => 'permit_empty|numeric',
            'longitude'    => 'permit_empty|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->with('error', $this->validator->getErrors())
                ->withInput();
        }

        // Data yang akan diupdate
        $data = [
            'nama_sekolah'   => $this->request->getPost('nama_sekolah'),
            'npsn'           => $this->request->getPost('npsn'),
            'jenjang'        => $this->request->getPost('jenjang'),
            'status_sekolah' => $this->request->getPost('status_sekolah'),
            'akreditasi'     => $this->request->getPost('akreditasi'),
            'kurikulum'      => $this->request->getPost('kurikulum'),
            'kecamatan'      => $this->request->getPost('kecamatan'),
            'alamat'         => $this->request->getPost('alamat'),
            'telepon'        => $this->request->getPost('telepon'),
            'email'          => $this->request->getPost('email'),
            'website'        => $this->request->getPost('website'),
            'latitude'       => $this->request->getPost('latitude'),
            'longitude'      => $this->request->getPost('longitude'),
        ];

        // Upload Cover
        $cover = $this->request->getFile('cover');
        if ($cover && $cover->isValid() && !$cover->hasMoved()) {
            $coverName = time() . '_' . $cover->getRandomName();
            $cover->move('uploads/cover', $coverName);
            $data['cover'] = $coverName;
            
            // Hapus cover lama
            if (!empty($sekolah['cover']) && file_exists('uploads/cover/' . $sekolah['cover'])) {
                unlink('uploads/cover/' . $sekolah['cover']);
            }
        }

        // Upload Logo
        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $logoName = time() . '_' . $logo->getRandomName();
            $logo->move('uploads/logo', $logoName);
            $data['logo'] = $logoName;
            
            // Hapus logo lama
            if (!empty($sekolah['logo']) && file_exists('uploads/logo/' . $sekolah['logo'])) {
                unlink('uploads/logo/' . $sekolah['logo']);
            }
        }

        // Upload Foto
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = time() . '_' . $foto->getRandomName();
            $foto->move('uploads/sekolah', $fotoName);
            $data['foto'] = $fotoName;
            
            // Hapus foto lama
            if (!empty($sekolah['foto']) && file_exists('uploads/sekolah/' . $sekolah['foto'])) {
                unlink('uploads/sekolah/' . $sekolah['foto']);
            }
        }

        // Update data
        if ($sekolah) {
            $sekolahModel->update($sekolah['id'], $data);
        } else {
            $data['user_id'] = $userId;
            $sekolahModel->insert($data);
        }

        return redirect()->to('/admin/profil')
            ->with('success', 'Profil sekolah berhasil diperbarui!');
    }

    // ============================================
    // PROFIL SEKOLAH - TAMPIL
    // ============================================
    public function profil()
    {
        $sekolahModel = new SekolahModel();
        $userId = session()->get('id');
        $sekolah = $sekolahModel->where('user_id', $userId)->first();

        $data = [
            'title'       => 'Edit Profil Sekolah',
            'subtitle'    => 'Kelola identitas dan informasi sekolah',
            'active_menu' => 'profil',
            'sekolah'     => $sekolah ?: [],
        ];

        return view('admin/profil', $data);
    }

    // ============================================
    // VISI & MISI - UPDATE
    // ============================================
    public function updateVisi()
    {
        $sekolahModel = new SekolahModel();
        $userId = session()->get('id');
        $sekolah = $sekolahModel->where('user_id', $userId)->first();

        $data = [
            'visi' => $this->request->getPost('visi'),
            'misi' => $this->request->getPost('misi'),
        ];

        if ($sekolah) {
            $sekolahModel->update($sekolah['id'], $data);
        } else {
            $data['user_id'] = $userId;
            $sekolahModel->insert($data);
        }

        return redirect()->to('/admin/visi')
            ->with('success', 'Visi & Misi berhasil diperbarui!');
    }

    // ============================================
    // VISI & MISI - TAMPIL
    // ============================================
    public function visi()
    {
        $sekolahModel = new SekolahModel();
        $userId = session()->get('id');
        $sekolah = $sekolahModel->where('user_id', $userId)->first();

        $data = [
            'title'       => 'Visi & Misi',
            'subtitle'    => 'Kelola visi dan misi sekolah',
            'active_menu' => 'visi',
            'sekolah'     => $sekolah ?: [],
        ];

        return view('admin/visi', $data);
    }

    // ============================================
    // KEPALA SEKOLAH - UPDATE
    // ============================================
    public function updateKepala()
    {
        $sekolahModel = new SekolahModel();
        $userId = session()->get('id');
        $sekolah = $sekolahModel->where('user_id', $userId)->first();

        $data = [
            'kepala_sekolah' => $this->request->getPost('kepala_sekolah'),
            'nip_kepala'     => $this->request->getPost('nip_kepala'),
            'sambutan'       => $this->request->getPost('sambutan'),
        ];

        // Upload Foto Kepala
        $foto = $this->request->getFile('foto_kepala');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = time() . '_' . $foto->getRandomName();
            $foto->move('uploads/kepala', $fotoName);
            $data['foto_kepala'] = $fotoName;
            
            // Hapus foto lama
            if (!empty($sekolah['foto_kepala']) && file_exists('uploads/kepala/' . $sekolah['foto_kepala'])) {
                unlink('uploads/kepala/' . $sekolah['foto_kepala']);
            }
        }

        if ($sekolah) {
            $sekolahModel->update($sekolah['id'], $data);
        } else {
            $data['user_id'] = $userId;
            $sekolahModel->insert($data);
        }

        return redirect()->to('/admin/kepala')
            ->with('success', 'Data Kepala Sekolah berhasil diperbarui!');
    }

    // ============================================
    // KEPALA SEKOLAH - TAMPIL
    // ============================================
    public function kepala()
    {
        $sekolahModel = new SekolahModel();
        $userId = session()->get('id');
        $sekolah = $sekolahModel->where('user_id', $userId)->first();

        $data = [
            'title'       => 'Kepala Sekolah',
            'subtitle'    => 'Kelola data kepala sekolah',
            'active_menu' => 'kepala',
            'sekolah'     => $sekolah ?: [],
        ];

        return view('admin/kepala', $data);
    }

    // ============================================
    // LOKASI - UPDATE
    // ============================================
    public function updateLokasi()
    {
        $sekolahModel = new SekolahModel();
        $userId = session()->get('id');
        $sekolah = $sekolahModel->where('user_id', $userId)->first();

        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');

        // Validasi
        if (!is_numeric($latitude) || !is_numeric($longitude)) {
            return redirect()->to('/admin/lokasi')
                ->with('error', 'Koordinat harus berupa angka yang valid!');
        }

        // Gabungkan koordinat untuk field 'koordinat' jika ada
        $data = [
            'latitude'  => $latitude,
            'longitude' => $longitude,
            'koordinat' => $latitude . ', ' . $longitude,
        ];

        if ($sekolah) {
            $sekolahModel->update($sekolah['id'], $data);
        } else {
            $data['user_id'] = $userId;
            $sekolahModel->insert($data);
        }

        return redirect()->to('/admin/lokasi')
            ->with('success', 'Lokasi sekolah berhasil diperbarui!');
    }

    // ============================================
    // LOKASI - TAMPIL
    // ============================================
    public function lokasi()
    {
        $sekolahModel = new SekolahModel();
        $userId = session()->get('id');
        $sekolah = $sekolahModel->where('user_id', $userId)->first();

        $data = [
            'title'       => 'Lokasi Sekolah',
            'subtitle'    => 'Atur lokasi dan peta sekolah',
            'active_menu' => 'lokasi',
            'sekolah'     => $sekolah ?: [],
        ];

        return view('admin/lokasi', $data);
    }

    // ============================================
    // PREVIEW WEBSITE
    // ============================================
    public function preview()
    {
        $sekolahModel = new SekolahModel();
        $userId = session()->get('id');
        $sekolah = $sekolahModel->where('user_id', $userId)->first();

        // Hitung progress untuk preview
        $items = [
            'nama_sekolah' => $sekolah['nama_sekolah'] ?? null,
            'visi'         => $sekolah['visi'] ?? null,
            'misi'         => $sekolah['misi'] ?? null,
            'kepala_sekolah' => $sekolah['kepala_sekolah'] ?? null,
            'alamat'       => $sekolah['alamat'] ?? null,
            'koordinat'    => $sekolah['koordinat'] ?? null,
        ];

        $totalItems = count($items);
        $filledItems = 0;
        foreach ($items as $item) {
            if (!empty($item)) $filledItems++;
        }
        $progress = ($totalItems > 0) ? round(($filledItems / $totalItems) * 100) : 0;

        $data = [
            'title'       => 'Preview Website',
            'subtitle'    => 'Lihat tampilan website sekolah Anda',
            'active_menu' => 'preview',
            'sekolah'     => $sekolah ?: [],
            'progress'    => $progress,
        ];

        return view('admin/preview', $data);
    }

    // ============================================
    // REDIRECT: DATA SEKOLAH -> PROFIL
    // ============================================
    public function dataSekolah()
    {
        return redirect()->to('/admin/profil');
    }

    public function detailSekolah($id)
    {
        return redirect()->to('/admin/profil');
    }

    public function hapusSekolah($id)
    {
        // Existing logic - TIDAK DIUBAH
        return redirect()->to('/admin/profil');
    }

    // ============================================
    // REDIRECT: PETA -> LOKASI
    // ============================================
    public function peta()
    {
        return redirect()->to('/admin/lokasi');
    }
}