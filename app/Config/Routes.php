<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
$routes->get('/', 'Home::index');
$routes->get('/data-sekolah', 'Home::dataSekolah');
$routes->get('/detail-peta', 'Home::detailPeta');
$routes->get('/sekolah/(:num)', 'Home::detailPeta/$1');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
$routes->get('/admin/login', 'Auth::login');
$routes->post('/process-login', 'Auth::processLogin');
$routes->get('/logout', 'Auth::logout');

/*
|--------------------------------------------------------------------------
| SUPER ADMIN
|--------------------------------------------------------------------------
*/
$routes->group('superadmin', function ($routes) {

    $routes->get('dashboard', 'SuperAdmin::dashboard');
    $routes->get('peta', 'PetaSekolah::index');

    $routes->get('data-sekolah', 'DataSekolah::index');
    $routes->get('detail-sekolah/(:num)', 'DataSekolah::detail/$1');

    $routes->get('data-operator', 'OperatorManagement::index');
    $routes->get('tambah-operator', 'OperatorManagement::create');
    $routes->post('simpan-operator', 'OperatorManagement::store');
    $routes->get('edit-operator/(:num)', 'OperatorManagement::edit/$1');
    $routes->post('update-operator/(:num)', 'OperatorManagement::update/$1');
    $routes->get('delete-operator/(:num)', 'OperatorManagement::delete/$1');

    $routes->get('laporan', 'Laporan::index');
});

/*
|--------------------------------------------------------------------------
| ADMIN / OPERATOR (INI YANG KAMU PAKAI SEKARANG)
|--------------------------------------------------------------------------
*/
$routes->group('admin', function ($routes) {
    /*
    |--------------------------
    | DASHBOARD & DATA
    |--------------------------
    */
     $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('data-sekolah', 'Admin::dataSekolah');

    $routes->get('detail-sekolah/(:num)', 'Admin::detailSekolah/$1');
    $routes->get('hapus-sekolah/(:num)', 'Admin::hapusSekolah/$1');

    $routes->get('peta', 'Admin::peta');

    /*
    |--------------------------
    | PROFIL SEKOLAH (OPERATOR)
    |--------------------------
    */
    $routes->get('profil', 'Admin::profil');
    $routes->post('update-profil', 'Admin::updateProfil');

    /*
    |--------------------------
    | VISI MISI
    |--------------------------
    */
    $routes->get('visi', 'Admin::visi');
    $routes->post('update-visi', 'Admin::updateVisi');

    /*
    |--------------------------
    | KEPALA SEKOLAH
    |--------------------------
    */
    $routes->get('kepala', 'Admin::kepala');
    $routes->post('update-kepala', 'Admin::updateKepala');

    /*
    |--------------------------
    | LOKASI
    |--------------------------
    */
    $routes->get('lokasi', 'Admin::lokasi');
    $routes->post('update-lokasi', 'Admin::updateLokasi');

    /*
    |--------------------------
    | PREVIEW
    |--------------------------
    */
    $routes->get('preview', 'Admin::preview');
});