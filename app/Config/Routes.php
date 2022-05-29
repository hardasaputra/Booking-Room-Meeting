<?php

namespace Config;

use App\Controllers\User;

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
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('admin');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//index
$routes->get('/', 'indexutama::index');
$routes->post('/checklogin', 'indexutama::login');
$routes->get('/logout', 'indexutama::logout');


//admin
$routes->get('/admin', 'admin::index');
$routes->get('/admin/saveAdmin', 'admin::save');
$routes->POST('/admin/delete/(:num)', 'admin::delete/$1');

//route update dan get data admin
$routes->get('/admin/getdata/(:num)', 'admin::getdata/$1');
$routes->post('/admin/update/(:num)', 'admin::update/$1');

//ruangan
$routes->get('/ruangan', 'admin::ruangandata');
$routes->get('/ruangan/saveRuangan', 'ruangan::save');
$routes->POST('/ruangan/deleteruangan/(:num)', 'ruangan::delete/$1');

//route update dan get data ruangan
$routes->get('/ruangan/getdata/(:num)', 'ruangan::getdata/$1');
$routes->post('/ruangan/update/(:num)', 'ruangan::update/$1');

//user
$routes->get('/user', 'user::index');
$routes->get('/user/saveUser', 'user::save');
$routes->POST('/user/delete/(:num)', 'user::delete/$1');

//route update dan get data User
$routes->get('/user/getdata/(:num)', 'user::getdata/$1');
$routes->post('/user/update/(:num)', 'user::update/$1');

//User Interface Add Event (Route)
$routes->get('/indexuser', 'addevent::index'); //route ini untuk menampilkan tampilan event
$routes->post('/indexuser/save', 'addevent::save'); //route ini untuk menyimpan event

//addevent
$routes->post('/addevent', 'addevent::save');
$routes->get('/addevent/getevent/(:num)', 'addevent::getevent/$1');
$routes->post('/addevent/update/(:num)', 'addevent::update/$1');
$routes->post('/addevent/delete/(:num)', 'addevent::delete/$1');

//get data password
$routes->get('/admin/getpassword/(:num)', 'admin::getpassword/$1');
$routes->get('/user/getpassword/(:num)', 'user::getpassword/$1');



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
