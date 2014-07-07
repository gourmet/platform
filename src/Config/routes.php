<?php

use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::scope('/', function($routes) {

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	$routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	$routes->connect('/pages/*', ['controller', => 'pages', 'action' => 'display']);

/**
 * Connect a route for the index action of any controller.
 * And a more general catch all route for any action.
 *
 * You can remove these routes once you've connected the
 * routes you want in your application.
 */
	$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);
	$routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);

});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
