<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('login', 'AuthenticatedController::login');
$routes->get('logout', 'AuthenticatedController::logout');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'DashboardController::index');
    // DATA USER
    $routes->get('data-user', 'AccountController::index');
    // BIODATA PENJUAL & PEMBELI
    $routes->get('biodata/penjual', 'DataDiriController::index');
    $routes->get('biodata/pembeli', 'DataDiriController::pembeli');
    $routes->post('create-biodata', 'DataDiriController::create');
    $routes->post('update-biodata/(:num)', 'DataDiriController::update/$1');
    $routes->get('delete-biodata/(:num)', 'DataDiriController::delete/$1');
    // TIKET
    $routes->get('tiket-darat', 'TiketController::darat');
    $routes->get('tiket-laut', 'TiketController::laut');
    $routes->get('tiket-udara', 'TiketController::udara');
    $routes->post('create-tiket', 'TiketController::store');
    $routes->post('update-tiket/(:num)', 'TiketController::update/$1');
    $routes->get('delete-tiket/(:num)', 'TiketController::delete/$1');
    $routes->get('detail/tiket-darat', 'TiketController::detail_darat');
    $routes->get('detail/tiket-laut', 'TiketController::detail_laut');
    $routes->get('detail/tiket-udara', 'TiketController::detail_udara');
    // PESANAN
    $routes->get('pesanan/bus', 'PesananController::bus');
    $routes->get('pesanan/kereta', 'PesananController::kereta');
    $routes->get('pesanan/angkutan', 'PesananController::angkutan');
    $routes->get('pesanan/kapal', 'PesananController::kapal');
    $routes->get('pesanan/pesawat', 'PesananController::pesawat');
    $routes->get('pesanan/delete/(:num)', 'PesananController::delete/$1');
    // PAYMENT
    $routes->match(['get', 'post'], 'payment/(:num)/(:any)/(:any)', 'MidtransController::index/$1/$2/$3');
    $routes->match(['get', 'post'], 'payment/update/(:any)', 'MidtransController::update/$1');
    $routes->get('payment/billing/SdzC64i0Nt8mRsEUK6eK1q4npbrh1pDI128sEi35WPCrz97eVB', 'MidtransController::billing');
    // TRANSAKSI
    $routes->get('transaksi/bus', 'TransaksiController::bus');
    $routes->get('transaksi/kereta', 'TransaksiController::kereta');
    $routes->get('transaksi/angkutan', 'TransaksiController::angkutan');
    $routes->get('transaksi/kapal', 'TransaksiController::kapal');
    $routes->get('transaksi/pesawat', 'TransaksiController::pesawat');
    $routes->get('transaksi/delete/(:num)', 'TransaksiController::delete/$1');
});
