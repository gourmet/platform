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

/**
 * Define extra functions.
 */
	require CAKE . 'basics.php';
	require 'functions.php';

/**
 * Set the application's debug mode.
 */
	Cake\Core\Configure::write('debug', file_exists(ROOT . DS . '.debug'));

/**
 * Set the application's default configurations.
 *
 * All configuration values can be overloaded in `.localconfig` or using
 * environment variables (including `debug`).
 */
	require CONFIG . 'application.php';
	require CONFIG . 'paths.php';
	require CONFIG . 'security.php';
	require CONFIG . 'acl.php';
	require CONFIG . 'session.php';
	require CONFIG . 'dispatcher.php';

/**
 * Local/runtime overload of all configuration values.
 */
	if (file_exists(ROOT . DS . '.localconfig')) {
		require ROOT . DS . '.localconfig';
	}

/**
 * Engines configuration.
 *
 * All engines' configuration values can be overloaded in `.localconfig`
 * or using environment variables.
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
