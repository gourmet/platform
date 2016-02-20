<?php

use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Core\Plugin;

Plugin::load('AssetCompress', ['bootstrap' => true]);
Plugin::load('BootstrapUI');
Plugin::load('Crud');
Plugin::load('CrudView');
Plugin::load('Migrations');
Plugin::load('Gourmet/Email');
Plugin::load('Gourmet/Faker');
Plugin::load('Gourmet/Robo');

/**
 * If in debug mode, try loading DebugKit.
 */
if (Configure::read('debug')) {
    try {
        Plugin::load('DebugKit', ['bootstrap' => true]);
        Plugin::load('Gourmet/Whoops');
    } catch (MissingPluginException $e) {
    }
}

/**
 * If using the CLI, try loading Bake.
 */
if (php_sapi_name() === 'cli') {
    try {
        Plugin::load('Bake');
    } catch (MissingPluginException $e) {
    }
}
