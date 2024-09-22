<?php

namespace Config;


// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('user', 'User::getList', ['filter' => 'admin_auth']);
$routes->get('login', 'User::getLogin', ['filter' => 'auth']);
$routes->post('login', 'User::postLogin', ['as' => 'login'], ['filter' => 'auth']);
$routes->get('user/user_ok', 'User::getUser_ok');
$routes->get('user/unauthorized', 'User::getUnauthorized',['as' => 'unauthorized']);
$routes->get('user/logout', 'User::getLogout', ['filter' => 'no_auth']);
$routes->get('register', 'User::getRegister', ['filter' => 'auth']);
$routes->post('register', 'User::PostRegister', ['filter' => 'auth']);
$routes->get('user/profile', 'User::getProfile',['filter' => 'no_auth']);
$routes->post('user/profile', 'User::UpdateProfile',['filter' => 'no_auth']);
$routes->post('user/delete', 'User::deleteUser', ['filter' => 'no_auth']);
$routes->get('user/edit/(:any)', 'User::getProfileByEmail/$1', ['filter' => 'admin_auth']);
$routes->post('user/edit/(:any)', 'User::UpdateProfileByEmail/$1', ['filter' => 'admin_auth']);

//routes for car:
$routes->get('car', 'Car::getCarList', ['filter' => 'no_auth']);
$routes->get('car/create', 'Car::getCreateCar', ['filter' => 'admin_auth']);
$routes->post('car/create', 'Car::PostCreateCar', ['filter' => 'admin_auth']);
$routes->get('car/detail/(:num)', 'Car::getCarDetail/$1');
$routes->post('car/delete/(:num)', 'Car::deleteCar/$1', ['filter' => 'admin_auth']);
$routes->get('car/rent/', 'Rent::CheckCars');
$routes->post('car/rent/(:num)', 'Rent::RentCar/$1', ['filter' => 'no_auth']);


//$routes->add('user/login', 'User::postLogin', ['as' => 'user/login', 'filter' => 'noauth']);

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
