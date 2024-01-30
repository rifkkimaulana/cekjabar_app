<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers\CekJabar');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Dashboard Index
$routes->group('/', ['namespace' => 'App\Controllers\CekJabar'], function ($routes) {
	$routes->get('/', 'Home::index');
});

// Authentication Index
$routes->group('/', ['namespace' => 'App\Controllers\Auth'], function ($routes) {
	$routes->get('login', 'Login::index');
	$routes->post('login', 'Login::login_post');

	$routes->get('buat-akun', 'Daftar::index');
	$routes->post('buat-akun-baru', 'Daftar::buat');

	$routes->get('lupa-password', 'Lupa_password::index');
	$routes->post('lupa-password', 'Lupa_password::post');
});


// Admin Index
$routes->group('/', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
	$routes->get('dashboard', 'Dashboard::index');
	$routes->get('komentar', 'Komentar::index');
	$routes->get('keluar', 'Dashboard::keluar');
	$routes->get('error/access-denied', 'Dashboard::noAkses');
});

// Admin Berita Index
$routes->group('berita', ['namespace' => 'App\Controllers\Admin\Berita'], function ($routes) {
	// Sub Menu Berita
	$routes->get('/', 'Berita::index');
	$routes->get('tambah', 'Berita::tambah_view');
	$routes->get('ubah/(:num)', 'Berita::ubah_view/$1');
	$routes->get('list', 'Berita::index');
	$routes->post('tambah', 'Berita::tambah');
	$routes->post('ubah', 'Berita::ubah');
	$routes->get('hapus/(:num)', 'Berita::hapus/$1');

	// Sub Menu Kategori
	$routes->get('kategori', 'Kategori::index');
	$routes->post('kategori/tambah', 'Kategori::tambah');
	$routes->post('kategori/ubah', 'Kategori::ubah');
	$routes->get('kategori/hapus/(:num)', 'Kategori::hapus/$1');

	// Sub Mneu Tag
	$routes->get('tag', 'Tag::index');
	$routes->post('tag/tambah', 'Tag::tambah');
	$routes->post('tag/ubah', 'Tag::ubah');
	$routes->get('tag/hapus/(:num)', 'Tag::hapus/$1');
});

// Menu Pengaturan Index
$routes->group('pengaturan', ['namespace' => 'App\Controllers\Admin\Pengaturan'], function ($routes) {
	// Sub Menu Manajemen Pengguna
	$routes->get('pengguna', 'Pengguna::index');
	$routes->post('pengguna/tambah', 'Pengguna::tambah');
	$routes->post('pengguna/ubah', 'Pengguna::ubah');
	$routes->get('pengguna/hapus/(:num)', 'Pengguna::hapus/$1');
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
