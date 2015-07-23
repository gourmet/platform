<?php

use Cake\Core\Configure;

/**
 * Configure basic information about the application.
 *
 * - title - The default TITLE to use in HTML and footer.
 * - author - The name to show in the author META.
 * - namespace - The namespace to find app classes under.
 * - encoding - The encoding used for HTML + database connections.
 * - timezone -
 * - base - The base directory the app resides in. If false this
 *   will be auto detected.
 * - dir - Name of app directory.
 * - webroot - The webroot directory.
 * - wwwRoot - The file path to webroot.
 * - baseUrl - To configure CakePHP to *not* use mod_rewrite and to
 *   use CakePHP pretty URLs, remove these .htaccess
 *   files:
 *      /.htaccess
 *      /webroot/.htaccess
 *   And uncomment the baseUrl key below.
 * - fullBaseUrl - A base URL to use for absolute links.
 * - imageBaseUrl - Web path to the public images directory under webroot.
 * - cssBaseUrl - Web path to the public css directory under webroot.
 * - jsBaseUrl - Web path to the public js directory under webroot.
 * - paths - Configure paths for non class based resources. Supports the
 *   `plugins`, `templates`, `locales` subkeys, which allow the definition of
 *   paths for plugins, view templates and locale files respectively.
 */

Configure::write('App', [
    'title' => env('APP_TITLE') ?: 'Your Application Name',
    'author' => 'Your Name',
    'namespace' => 'App',
    'encoding' => 'UTF-8',
    'timezone' => 'UTC',
    'base' => false,
    'dir' => APP_DIR,
    'webroot' => 'webroot',
    'wwwRoot' => WWW_ROOT,
    // 'baseUrl' => env('SCRIPT_NAME'),
    'fullBaseUrl' => false,
    'imageBaseUrl' => 'img/',
    'cssBaseUrl' => 'css/',
    'jsBaseUrl' => 'js/',
    'paths' => [
        'plugins' => [ROOT . DS . 'plugins' . DS],
        'templates' => [APP . 'Template' . DS],
        'locales' => [APP . 'Locale' . DS],
    ],
]);
