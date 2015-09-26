<?php

/**
 * Session configuration.
 *
 * Contains an array of settings to use for session configuration. The
 * `defaults` key is used to define a default preset to use for sessions, any
 * settings declared here will override the settings of the default config.
 *
 * ## Options
 *
 * - `cookie` - The name of the cookie to use. Defaults to 'CAKEPHP'.
 * - `cookiePath` - The url path for which session cookie is set. Maps to the
 *   `session.cookie_path` php.ini config. Defaults to base path of app.
 * - `timeout` - The time in minutes the session should be valid for.
 *    Pass 0 to disable checking timeout.
 * - `defaults` - The default configuration set to use as a basis for your session.
 *    There are four built-in options: php, cake, cache, database.
 * - `handler` - Can be used to enable a custom session handler. Expects an
 *    array with at least the `engine` key, being the name of the Session engine
 *    class to use for managing the session. CakePHP bundles the `CacheSession`
 *    and `DatabaseSession` engines.
 * - `ini` - An associative array of additional ini values to set.
 *
 * The built-in `defaults` options are:
 *
 * - 'php' - Uses settings defined in your php.ini.
 * - 'cake' - Saves session files in CakePHP's /tmp directory.
 * - 'database' - Uses CakePHP's database sessions.
 * - 'cache' - Use the Cache class to save sessions.
 *
 * To define a custom session handler, save it at src/Network/Session/<name>.php.
 * Make sure the class implements PHP's `SessionHandlerInterface` and set
 * Session.handler to <name>
 *
 * To use database sessions, load the SQL file located at config/Schema/sessions.sql
 */

return [
    'defaults' => 'php',
];
