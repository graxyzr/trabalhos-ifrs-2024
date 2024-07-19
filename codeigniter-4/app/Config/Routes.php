<?php

namespace Config;

use CodeIgniter\Routing\RouteCollectionInterface;
use CodeIgniter\Routing\Router;

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 *
 * Here is where you can register all of the routes for an application.
 * It's a breeze. Simply tell CodeIgniter the URI to match and the
 * controller/method to route to. Here's an example:
 *
 *      $routes->get('products', 'Product::index');
 *
 * And here is more complex example:
 *
 *      $routes->get('products/(:num)', 'Product::show/$1');
 *
 * Feel free to change as needed.
 *
 */

$routes->get('/','Remedios::index');

// Rotas para CRUD de Remédios
$routes->get('remedios', 'Remedios::index');
$routes->get('remedios/create', 'Remedios::create');
$routes->post('remedios/store', 'Remedios::store');
$routes->get('remedios/edit/(:num)', 'Remedios::edit/$1');
$routes->post('remedios/update/(:num)', 'Remedios::update/$1');
$routes->post('remedios/delete/(:num)', 'Remedios::delete/$1');
$routes->post('remedios/search', 'Remedios::searchByNome');
$routes->get('remedios/most_expensive', 'Remedios::findMostExpensive');
$routes->get('remedios/most_quantity', 'Remedios::findMostQuantity');