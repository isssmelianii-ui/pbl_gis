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

// ============================================
// PUBLIC WEBSITE - FULL LAYAR
// ============================================
$routes->get('/public-website', 'PublicWebsite::index');

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
| LANDING PAGE (Setelah Login)
|--------------------------------------------------------------------------
*/
$routes->get('/landing', 'Landing::index');
$routes->post('/landing/processLanding', 'Landing::processLanding');

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
| ADMIN / OPERATOR
|--------------------------------------------------------------------------
*/
$routes->group('admin', function ($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('data-sekolah', 'Admin::dataSekolah');

    $routes->get('detail-sekolah/(:num)', 'Admin::detailSekolah/$1');
    $routes->get('hapus-sekolah/(:num)', 'Admin::hapusSekolah/$1');

    $routes->get('peta', 'Admin::peta');

    $routes->get('profil', 'Admin::profil');
    $routes->post('update-profil', 'Admin::updateProfil');

    $routes->get('visi', 'Admin::visi');
    $routes->post('update-visi', 'Admin::updateVisi');

    $routes->get('kepala', 'Admin::kepala');
    $routes->post('update-kepala', 'Admin::updateKepala');

    $routes->get('lokasi', 'Admin::lokasi');
    $routes->post('update-lokasi', 'Admin::updateLokasi');

    $routes->get('preview', 'Admin::preview');
    // Public Website - Full Layar
$routes->get('/public-website', 'PublicWebsite::index');
});