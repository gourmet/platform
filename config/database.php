<?php

use Cake\Datasource\ConnectionManager;
use Cake\Utility\Hash;

ConnectionManager::config(Hash::merge([
    'default' => [
        'className' => 'Cake\Database\Connection',
        'driver' => 'Cake\Database\Driver\Mysql',
        'persistent' => false,
        'host' => env('DATABASE_DEFAULT_HOST') ?: 'localhost',
        'username' => env('DATABASE_DEFAULT_USER') ?: 'app',
        'password' => env('DATABASE_DEFAULT_PASS') ?: 'app',
        'database' => env('DATABASE_DEFAULT_NAME') ?: 'app',
        'prefix' => false,
        'encoding' => strtolower(str_replace('-', '', read('App.encoding'))),
        'timezone' => read('App.timezone'),
        'quoteIdentifiers' => false
    ],
    'test' => [
        'className' => 'Cake\Database\Connection',
        'driver' => 'Cake\Database\Driver\Mysql',
        'persistent' => false,
        'host' => env('DATABASE_TEST_HOST') ?: 'localhost',
        'username' => env('DATABASE_TEST_USER') ?: 'app',
        'password' => env('DATABASE_TEST_PASS') ?: 'app',
        'database' => env('DATABASE_TEST_NAME') ?: 'test_app',
        'prefix' => false,
        'encoding' => strtolower(str_replace('-', '', read('App.encoding'))),
        'timezone' => read('App.timezone'),
        'quoteIdentifiers' => false
    ]
], consume('Datasources')));
