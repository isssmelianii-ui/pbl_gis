<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class Admin extends BaseController
{
    protected $sekolah;

    public function __construct()
    {
        helper(['form', 'url']);

        if (!session()->get('logged_in')) {
            exit('Silakan login terlebih dahulu.');
        }

        // if (session()->get('role') != 'operator') {
        //     exit('Akses Ditolak.');
        // }
        // Izinkan operator dan super_admin
    $role = session()->get('role');
    if ($role != 'operator' && $role != 'super_admin') {
        exit('Akses Ditolak.');
    }

        $this->sekolah = new SekolahModel();
    }

    /*
    |---------------------------------------
    | AMBIL SEKOLAH OPERATOR (SAFE ARRAY)
    |---------------------------------------
    */
    private function sekolahSaya(): array
    {
        $sekolah = $this->sekolah
            ->where('user_id', session()->get('id'))
            ->first();

        if (!$sekolah) {
            $id = $this->sekolah->insert([
                'user_id' => session()->get('id'),
                'nama_sekolah' => '',
                'npsn' => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            $sekolah = $this->sekolah->find($id);
        }

        return is_array($sekolah) ? $sekolah : [];
    }

    /*
    |---------------------------------------
    | DASHBOARD
    |---------------------------------------
    */
    public function dashboard()
    {
        $sekolah = $this->sekolahSaya();

        $fields = [
            'nama_sekolah','npsn','jenjang','status_sekolah',
            'akreditasi','kurikulum','alamat','telepon',
            'email','website','visi','misi',
            'kepala_sekolah','foto','cover','logo'
        ];

        $isi = 0;

        foreach ($fields as $f) {
            if (!empty($sekolah[$f] ?? null)) {
                $isi++;
            }
        }

        $persen = round(($isi / count($fields)) * 100);

        return view('admin/dashboard', [
            'title' => 'Dashboard Operator',
            'sekolah' => $sekolah,
            'persen' => $persen
        ]);
    }

    /*
    |---------------------------------------
    | PROFIL
    |---------------------------------------
    */
    public function profil()
    {
        return view('admin/profil', [
            'title' => 'Profil Sekolah',
            'sekolah' => $this->sekolahSaya()
        ]);
    }

    /*
    |---------------------------------------
    | UPDATE PROFIL (SAFE FILE UPLOAD)
    |---------------------------------------
    */
    public function updateProfil()
    {
        $sekolah = $this->sekolahSaya();

        $cover = $this->request->getFile('cover');
        $logo  = $this->request->getFile('logo');
        $foto  = $this->request->getFile('foto');

        $coverName = $sekolah['cover'] ?? '';
        $logoName  = $sekolah['logo'] ?? '';
        $fotoName  = $sekolah['foto'] ?? '';

        // COVER
        if ($cover && $cover->isValid() && !$cover->hasMoved()) {
            $coverName = $cover->getRandomName();
            $cover->move(FCPATH . 'uploads/cover/', $coverName);
        }

        // LOGO
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $logoName = $logo->getRandomName();
            $logo->move(FCPATH . 'uploads/logo/', $logoName);
        }

        // FOTO
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/sekolah/', $fotoName);
        }

        $this->sekolah->update($sekolah['id'], [
            'nama_sekolah' => $this->request->getPost('nama_sekolah'),
            'npsn' => $this->request->getPost('npsn'),
            'jenjang' => $this->request->getPost('jenjang'),
            'status_sekolah' => $this->request->getPost('status_sekolah'),
            'akreditasi' => $this->request->getPost('akreditasi'),
            'kurikulum' => $this->request->getPost('kurikulum'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'website' => $this->request->getPost('website'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'cover' => $coverName,
            'logo' => $logoName,
            'foto' => $fotoName,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin/profil')
            ->with('success', 'Profil berhasil diperbarui');
    }

    /*
    |---------------------------------------
    | VISI MISI
    |---------------------------------------
    */
    public function visi()
    {
        return view('admin/visi', [
            'title' => 'Visi & Misi',
            'sekolah' => $this->sekolahSaya()
        ]);
    }

    public function updateVisi()
    {
        $sekolah = $this->sekolahSaya();

        $this->sekolah->update($sekolah['id'], [
            'visi' => $this->request->getPost('visi'),
            'misi' => $this->request->getPost('misi'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin/visi')
            ->with('success', 'Visi & Misi berhasil diperbarui');
    }

    /*
    |---------------------------------------
    | KEPALA SEKOLAH
    |---------------------------------------
    */
    public function kepala()
    {
        return view('admin/kepala', [
            'title' => 'Kepala Sekolah',
            'sekolah' => $this->sekolahSaya()
        ]);
    }

    public function updateKepala()
    {
        $sekolah = $this->sekolahSaya();

        $foto = $this->request->getFile('foto_kepala');

        $fotoKepala = $sekolah['foto_kepala'] ?? '';

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoKepala = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/kepala/', $fotoKepala);
        }

        $this->sekolah->update($sekolah['id'], [
            'kepala_sekolah' => $this->request->getPost('kepala_sekolah'),
            'nip_kepala' => $this->request->getPost('nip_kepala'),
            'sambutan' => $this->request->getPost('sambutan'),
            'foto_kepala' => $fotoKepala,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin/kepala')
            ->with('success', 'Data Kepala Sekolah berhasil diperbarui');
    }
    /*
|---------------------------------------
| TAMBAH SEKOLAH (Untuk Super Admin)
|---------------------------------------
*/
// public function tambahSekolah()
// {
//     // Cek akses - izinkan super_admin DAN admin
//     $role = session()->get('role');
//     if ($role != 'super_admin' && $role != 'operator') {
//         return redirect()->to('/admin/dashboard')->with('error', 'Akses Ditolak!');
//     }

//     return view('admin/tambah_sekolah', [
//         'title' => 'Tambah Sekolah'
//     ]);
// }

/*
|---------------------------------------
| SIMPAN SEKOLAH BARU
|---------------------------------------
*/
// public function simpanSekolah()
// {
//     // Cek akses
//     $role = session()->get('role');
//     if ($role != 'super_admin' && $role != 'admin') {
//         return redirect()->to('/admin/dashboard')->with('error', 'Akses Ditolak!');
//     }

//     // Validasi input
//     $rules = [
//         'nama_sekolah' => 'required|min_length[3]',
//         'npsn' => 'required|numeric|min_length[4]|is_unique[tb_sekolah.npsn]',
//         'jenjang' => 'required',
//         'status' => 'required',
//         'kecamatan' => 'required',
//         'alamat' => 'required',
//         'telepon' => 'required',
//         'email' => 'required|valid_email',
//     ];

//     if (!$this->validate($rules)) {
//         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
//     }

//     // Simpan data
//     $data = [
//         'nama_sekolah' => $this->request->getPost('nama_sekolah'),
//         'npsn' => $this->request->getPost('npsn'),
//         'jenjang' => $this->request->getPost('jenjang'),
//         'status_sekolah' => $this->request->getPost('status'),
//         'akreditasi' => $this->request->getPost('akreditasi'),
//         'kecamatan' => $this->request->getPost('kecamatan'),
//         'kurikulum' => $this->request->getPost('kurikulum'),
//         'alamat' => $this->request->getPost('alamat'),
//         'telepon' => $this->request->getPost('telepon'),
//         'email' => $this->request->getPost('email'),
//         'website' => $this->request->getPost('website'),
//         'latitude' => $this->request->getPost('latitude'),
//         'longitude' => $this->request->getPost('longitude'),
//         'created_at' => date('Y-m-d H:i:s'),
//     ];

//     // Gunakan model untuk insert
//     $sekolahModel = new \App\Models\SekolahModel();
//     $sekolahModel->save($data);

//     return redirect()->to('/admin/data-sekolah')->with('success', 'Data sekolah berhasil ditambahkan!');
// }
    /*
    |---------------------------------------
    | LOKASI
    |---------------------------------------
    */
    public function lokasi()
    {
        return view('admin/lokasi', [
            'title' => 'Lokasi Sekolah',
            'sekolah' => $this->sekolahSaya()
        ]);
    }

    public function updateLokasi()
    {
        $sekolah = $this->sekolahSaya();

        $this->sekolah->update($sekolah['id'], [
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin/lokasi')
            ->with('success', 'Lokasi berhasil diperbarui');
    }
    public function dataSekolah()
{
    $model = new \App\Models\SekolahModel();
    $keyword = $this->request->getGet('keyword');

    $query = $model;

    if ($keyword) {
        $query = $query->like('nama_sekolah', $keyword);
    }

    // Data untuk tabel (semua sekolah)
    $dataSekolah = $query->findAll();
    
    // Data untuk map (sekolah milik operator yang login)
    $sekolahMap = $this->sekolahSaya();
    
    // Jika tidak ada data, gunakan default
    if (empty($sekolahMap)) {
        $sekolahMap = [
            'nama_sekolah' => 'Sekolah Default',
            'alamat' => 'Alamat tidak tersedia',
            'latitude' => '-0.947083',
            'longitude' => '100.417181'
        ];
    }

    return view('admin/data_sekolah', [
        'sekolah' => $dataSekolah,        // Untuk tabel
        'sekolah_map' => $sekolahMap,     // Untuk footer
        'keyword' => $keyword ?? ''
    ]);
}
    /*
    |---------------------------------------
    | EDIT SEKOLAH
    |---------------------------------------
    */
        /*
    /*
|---------------------------------------
| EDIT SEKOLAH
|---------------------------------------
*/
    /*
    |---------------------------------------
    | UPDATE SEKOLAH (PROSES SIMPAN PERUBAHAN)
    |---------------------------------------
    */
   

    /*
    |---------------------------------------
    | HAPUS SEKOLAH
    |---------------------------------------
    */
    public function hapusSekolah($id = null)
    {
        // Cek akses - hanya super_admin yang bisa hapus
        $role = session()->get('role');
        if ($role != 'super_admin') {
            return redirect()->to('/admin/data-sekolah')->with('error', 'Hanya Super Admin yang bisa menghapus data!');
        }

        // Cek ID
        if ($id === null) {
            return redirect()->back()->with('error', 'ID tidak valid');
        }

        // Load model
        $model = new \App\Models\SekolahModel();

        // Cek apakah data ada
        $sekolah = $model->find($id);
        if (!$sekolah) {
            return redirect()->to('/admin/data-sekolah')->with('error', 'Data sekolah tidak ditemukan');
        }

        // Hapus data
        if ($model->delete($id)) {
            return redirect()->to('/admin/data-sekolah')
                ->with('success', 'Data sekolah berhasil dihapus!');
        } else {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data. Silakan coba lagi.');
        }
    }
    /*
|---------------------------------------
| DETAIL SEKOLAH
|---------------------------------------
*/
public function detailSekolah($id = null)
{
    // Cek akses
    $role = session()->get('role');
    if ($role != 'super_admin' && $role != 'operator') {
        return redirect()->to('/admin/dashboard')->with('error', 'Akses Ditolak!');
    }

    // Cek ID
    if ($id === null) {
        return redirect()->to('/admin/data-sekolah')->with('error', 'ID tidak ditemukan');
    }

    // Load model
    $model = new \App\Models\SekolahModel();
    $sekolah = $model->find($id);

    // Jika data tidak ditemukan
    if (!$sekolah) {
        return redirect()->to('/admin/data-sekolah')->with('error', 'Data tidak ditemukan');
    }

    // Kirim ke view
    return view('admin/detail_sekolah', [
        'title' => 'Detail Sekolah',
        'sekolah' => $sekolah,
        'sekolah_map' => $this->sekolahSaya()
    ]);
}
}