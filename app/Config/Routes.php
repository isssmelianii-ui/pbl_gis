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

$routes->get('detail-sekolah/(:num)', 'Home::detailSekolah/$1');


/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE
|--------------------------------------------------------------------------
*/

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
| LANDING PAGE
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

    // DASHBOARD
    $routes->get('dashboard', 'SuperAdmin::dashboard');

    // PETA
    $routes->get('peta', 'PetaSekolah::index');

    // DATA SEKOLAH
    $routes->get('data-sekolah', 'DataSekolah::index');

    $routes->get('detail-sekolah/(:num)', 'DataSekolah::detail/$1');

    $routes->get('hapus-sekolah/(:num)', 'DataSekolah::hapus/$1');

    // DATA OPERATOR
    $routes->get('data-operator', 'OperatorManagement::index');

    $routes->get('tambah-operator', 'OperatorManagement::create');

    $routes->post('simpan-operator', 'OperatorManagement::store');

    $routes->get('edit-operator/(:num)', 'OperatorManagement::edit/$1');

    $routes->post('update-operator/(:num)', 'OperatorManagement::update/$1');

    $routes->get('delete-operator/(:num)', 'OperatorManagement::delete/$1');

    // LAPORAN
    $routes->get('laporan', 'Laporan::index');

});


/*
|--------------------------------------------------------------------------
| ADMIN / OPERATOR SEKOLAH
|--------------------------------------------------------------------------
*/

$routes->group('admin', function ($routes) {

    // DASHBOARD
    $routes->get('dashboard', 'Admin::dashboard');

    // DATA SEKOLAH
    $routes->get('data-sekolah', 'Admin::dataSekolah');

    $routes->get('detail-sekolah/(:num)', 'Admin::detailSekolah/$1');

    $routes->get('hapus-sekolah/(:num)', 'Admin::hapusSekolah/$1');

    // PETA
    $routes->get('peta', 'Admin::peta');

    // PROFIL
    $routes->get('profil', 'Admin::profil');

    $routes->post('update-profil', 'Admin::updateProfil');

    // VISI MISI
    $routes->get('visi', 'Admin::visi');

    $routes->post('update-visi', 'Admin::updateVisi');

    // KEPALA SEKOLAH
    $routes->get('kepala', 'Admin::kepala');

    $routes->post('update-kepala', 'Admin::updateKepala');

    // LOKASI
    $routes->get('lokasi', 'Admin::lokasi');

    $routes->post('update-lokasi', 'Admin::updateLokasi');

    // PREVIEW WEBSITE
    $routes->get('preview', 'Admin::preview');

});


/*
|--------------------------------------------------------------------------
| 404 OVERRIDE
|--------------------------------------------------------------------------
*/

$routes->set404Override();