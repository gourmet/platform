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
	require APP . 'Config' . DS . 'application.php';
	require APP . 'Config' . DS . 'paths.php';
	require APP . 'Config' . DS . 'security.php';
	require APP . 'Config' . DS . 'acl.php';
	require APP . 'Config' . DS . 'session.php';
	require APP . 'Config' . DS . 'dispatcher.php';

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
	require APP . 'Config' . DS . 'database.php';
	require APP . 'Config' . DS . 'error.php';
	require APP . 'Config' . DS . 'cache.php';
	require APP . 'Config' . DS . 'email.php';
	require APP . 'Config' . DS . 'log.php';

/**
 * Load plugins.
 */
	require APP . 'Config' . DS . 'plugin.php';

/**
 *
 */
	require 'init.php';
