<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function (){
    return view('404');
});
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('lamar', 'pelamar::lamar');
$routes->get('register', 'Users::register');
$routes->post('tambah', 'Users::tambah');
$routes->post('ngedit', 'Users::ngedit');
$routes->post('admin/login', 'Users::login');
$routes->get('logout', 'Users::logout');
$routes->get('admin', 'Users::index');
$routes->post('hapususer', 'Users::hapus');
$routes->get('datapelamar', 'Pelamar::index');
$routes->get('cv', 'Pelamar::view');
$routes->get('panggil', 'Pelamar::kirimemail');
$routes->get('interview', 'Pelamar::interview');
$routes->get('diterima', 'Pelamar::diterima');
$routes->get('tolak', 'Tolak::index');
$routes->post('menolak', 'Pelamar::tolak');
$routes->get('ditolak', 'Pelamar::ditolak');
$routes->post('hapuspelamar', 'Pelamar::hapus');
$routes->get('acc', 'Pelamar::acc');
$routes->get('kelola', 'Kelola::index');
$routes->get('datauser', 'Users::view');
$routes->get('userprofil', 'Users::profil');
$routes->post('caridata', 'Pelamar::index');
$routes->post('cariinterview', 'Pelamar::interview');
$routes->post('cariditerima', 'Pelamar::diterima');
$routes->post('cariditolak', 'Pelamar::ditolak');
$routes->get('tambahdivisi', 'kelola::tambah');
$routes->post('nambahdivisi', 'kelola::nambah');
$routes->post('hapuslowongan', 'kelola::hapus');
$routes->get('edit', 'kelola::edit');
$routes->post('editdivisi', 'kelola::update');
$routes->get('editprofil', 'Users::edit');
$routes->post('delete', 'menolak::tolak');
$routes->get('lupas', 'lupas::index');
$routes->post('ubah', 'lupas::ubah');
$routes->get('password-baru', 'pasbaru::index');
$routes->get('ubah-password', 'Users::ubah');
$routes->get('kirim-pesan', 'kirim::pesan');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
