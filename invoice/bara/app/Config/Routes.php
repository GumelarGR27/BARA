<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('index', 'Home::index');
$routes->post('/', 'Home::index');
$routes->post('index', 'Home::index');
$routes->get('daftar', 'Pendaftaran::index');
$routes->post('daftar', 'Pendaftaran::index');
$routes->get('reminder', 'reminder::index');
$routes->post('remind', 'Remind::index');
$routes->get('form_remainder', 'Form_Remainder::index');
$routes->post('Client', 'Client::index');
$routes->get('Client', 'Client::index');
$routes->get('invoice', 'Ingpois::index');
$routes->get('inpois', 'Inpois::index');
$routes->get('tabel', 'tabel::index');
$routes->get('tabel_invoice', 'tabel_invoice::index');
$routes->get('tabel_reminder', 'tabel_reminder::index');
$routes->get('klien', 'klien::index');
$routes->get('tambah', 'tambah::index');
$routes->post('tambah', 'tamah::index');
$routes->get('datainvoice', 'invoice::index');
$routes->get('datainv', 'datainvoice::index');
$routes->post('datainvoice', 'invoice::index');
$routes->get('pdf', 'pdf::index');
$routes->post('tagihan', 'tagihann::index');
$routes->post('hapusklien', 'hapusclient::index');
$routes->post('hapusinvoice', 'hapusinvoice::index');
$routes->post('hapusreminder', 'hapusreminder::index');

$routes->get('login', 'login::index');
$routes->get('logout', 'Home::logout');
$routes->post('login', 'login::login');
$routes->get('profile', 'profile::index');
$routes->get('register', 'register::index');
$routes->post('register', 'register::tambah');
$routes->get('ubahpassword', 'ubahpassword::index');
$routes->get('Edit_Client', 'Edit_Client::index');
$routes->post('ngeditclient', 'ngeditclient::index');
$routes->post('ngeditreminder', 'ngeditreminder::index');
$routes->get('Edit_Invoice', 'Edit_Invoice::index');
$routes->post('ngeditinv', 'ngeditinv::index');
$routes->get('Edit_Reminder', 'Edit_Reminder::index');
$routes->get('file_data', 'pail::index');
$routes->get('datausers', 'user::index');
$routes->post('hapususer', 'hapususer::index');
$routes->post('lupas', 'lupas::index');
$routes->get('file_reminder', 'file_reminder::index');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
