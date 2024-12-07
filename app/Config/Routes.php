<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index', ['filter' => 'auth']);
// $routes->group('dashboard', ['filter' => 'auth'], function($routes) {
//     // Rute yang hanya dapat diakses oleh pengguna yang sudah login
// $routes->get('/', 'DashboardController::index');
// $routes->get('profile', 'DashboardController::profile');

// Rute lainnya yang memerlukan login
// Misalnya, rute untuk mengelola pengguna, laporan, dll.
// });

// $routes->group('auth/', static function ($routes){
//     $routes->get('login', 'AuthController::index');
//     $routes->post('login', 'AuthController::login');
//     $routes->get('logout', 'AuthController::logout');
// });




$routes->get('auth/login', 'Auth::login');
$routes->post('login/process', 'Auth::loginProcess');
$routes->get('logout', 'Auth::logout');
$routes->get('dashboard', 'DashboardController::index',['filter' => 'auth']);
// Customer Routes
$routes->group('customers', function ($routes) {
    $routes->get('', 'CustomersController::index'); // List all customers
    $routes->get('create', 'CustomersController::create'); // Show create form
    $routes->post('store', 'CustomersController::store'); // Store new customer
    $routes->get('edit/(:num)', 'CustomersController::edit/$1'); // Show edit form
    $routes->post('update/(:num)', 'CustomersController::update/$1'); // Update customer
    $routes->get('delete/(:num)', 'CustomersController::delete/$1'); // Delete customer
});

// Employee Routes
$routes->group('employees', function ($routes) {
    $routes->get('', 'EmployeesController::index'); // List all employees
    $routes->get('create', 'EmployeesController::create'); // Show create form
    $routes->post('store', 'EmployeesController::store'); // Store new employee
    $routes->get('edit/(:num)', 'EmployeesController::edit/$1'); // Show edit form
    $routes->post('update/(:num)', 'EmployeesController::update/$1'); // Update employee
    $routes->get('delete/(:num)', 'EmployeesController::delete/$1'); // Delete employee
});

// Orders Routes
$routes->group('orders', function ($routes) {
    $routes->get('', 'OrdersController::index'); // List all orders
    $routes->get('create', 'OrdersController::create'); // Show create form
    $routes->post('store', 'OrdersController::store'); // Store new order
    $routes->get('edit/(:num)', 'OrdersController::edit/$1'); // Show edit form
    $routes->post('update/(:num)', 'OrdersController::update/$1'); // Update order
    $routes->get('delete/(:num)', 'OrdersController::delete/$1'); // Delete order
});

$routes->group('services', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'ServicesController::index');      // List semua services
    $routes->get('create', 'ServicesController::create');  // Form untuk membuat service baru
    $routes->post('store', 'ServicesController::store');   // Simpan data service baru
    $routes->get('edit/(:num)', 'ServicesController::edit/$1');  // Form untuk edit service
    $routes->post('update/(:num)', 'ServicesController::update/$1'); // Update service
    $routes->get('delete/(:num)', 'ServicesController::delete/$1');  // Hapus service
});

$routes->group('payments', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'PaymentsController::index');         // Menampilkan semua pembayaran
    $routes->get('create', 'PaymentsController::create');    // Form untuk membuat pembayaran baru
    $routes->post('store', 'PaymentsController::store');      // Simpan data pembayaran baru
    $routes->get('edit/(:num)', 'PaymentsController::edit/$1'); // Form untuk edit pembayaran
    $routes->post('update/(:num)', 'PaymentsController::update/$1'); // Update pembayaran
    $routes->get('delete/(:num)', 'PaymentsController::delete/$1'); // Hapus pembayaran
});
$routes->group('reviews', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'ReviewsController::index');            // Menampilkan semua review
    $routes->get('create', 'ReviewsController::create');      // Form untuk membuat review baru
    $routes->post('store', 'ReviewsController::store');        // Simpan data review baru
    $routes->get('edit/(:num)', 'ReviewsController::edit/$1'); // Form untuk edit review
    $routes->post('update/(:num)', 'ReviewsController::update/$1'); // Update review
    $routes->get('delete/(:num)', 'ReviewsController::delete/$1'); // Hapus review
});
