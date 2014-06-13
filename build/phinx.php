<?php
/**
 * Phinx configuration.
 *
 * Using Phinx because CakeDC/Migrations has not been upgraded to Cake 3.0 yet.
 */

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR . 'start.php';

use Cake\Datasource\ConnectionManager;

$dbConfig = ConnectionManager::config('default');

return [
	'paths' => ['migrations' => __DIR__ . DS . 'Migration'],
	'environments' => [
		'default_migration_table' => 'schema_migrations',
		'default_database' => 'default',
		'default' => [
			'adapter' => 'mysql',
			'host' => $dbConfig['host'],
			'name' => $dbConfig['database'],
			'user' => $dbConfig['login'],
			'pass' => $dbConfig['password'],
			'charset' => $dbConfig['encoding'],
			'port' => 3306
		]
	]
];
