<?php

use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Core\Plugin;

Plugin::load('AssetCompress', ['bootstrap' => true]);
Plugin::load('Crud');
Plugin::load('Migrations');
Plugin::load('Gourmet/Faker');
Plugin::load('Gourmet/Robo');
Plugin::load('Gourmet/Whoops');

/**
 * If in debug mode, try loading DebugKit.
 */
if (Configure::read('debug')) {
    try {
        Plugin::load('DebugKit', ['bootstrap' => true]);
    } catch (MissingPluginException $e) {
    }
}
