<?php

/**
 * Start timer.
 */
define('TIME_START', microtime(true));

/**
 * Define paths' constants.
 */
require 'paths.php';

/**
 * Register autoloaders.
 */
require 'autoload.php';

try {
    $dotenv = (new josegonzalez\Dotenv\Loader(ROOT . DS . '.env'))
        ->parse()
        ->toEnv();
} catch (RuntimeException $e) {
    die($e->getMessage());
} catch (Exception $e) {
    // do nothing (env vars setup on server)
}

/**
 * Define extra functions.
 */
require CAKE . 'basics.php';
require 'functions.php';

Cake\Routing\Router::reload();

/**
 * Set the application's default configurations.
 */
Cake\Core\Configure::write([
    'debug' => file_exists(ROOT . DS . '.debug') or env('DEBUG'),
    'App' => include CONFIG . 'application.php',
    'Path' => include CONFIG . 'paths.php',
    'Security' => include CONFIG . 'security.php',
    'Session' => include CONFIG . 'session.php',
    'Acl' => include CONFIG . 'acl.php',
]);

/**
 * Dispatcher configuration.
 */
require CONFIG . 'dispatcher.php';

/**
 * Engines configuration.
 */
require CONFIG . 'database.php';
require CONFIG . 'error.php';
require CONFIG . 'cache.php';
require CONFIG . 'email.php';
require CONFIG . 'log.php';

/**
 * Load plugins.
 */
require CONFIG . 'plugin.php';

/**
 *
 */
require 'init.php';
