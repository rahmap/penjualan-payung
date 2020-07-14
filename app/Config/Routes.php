<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
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

$routes->get('/', 'Home::index', ['as' => 'root']);
$routes->get('/home', 'Home::index', ['as' => 'home']);
$routes->get('/pembayaran', 'Home::pembayaran', ['as' => 'payment']);
$routes->get('/produk/(:any)', 'Home::detail/$1', ['as' => 'detail_produk']);

$routes->group('auth', function($routes)
{
	$routes->add('/', function(){
		return redirect()->route('login');
	});
	$routes->get('login', 'Auth::login', ['as' => 'login']);
	$routes->get('register', 'Auth::register', ['as' => 'register']);
	$routes->get('logout', 'Auth::logout', ['as' => 'logout']);
});

$routes->get('admin/login', 'Auth::admin_login', ['as' => 'admin_login']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
