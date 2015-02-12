<?php
/**
 * Test runner bootstrap.
 *
 * Add additional configuration/setup the application needs when running
 * unit tests in this file.
 */
require dirname(__DIR__) . '/bootstrap/start.php';

// disable deep cloning of properties inside specify blocks
\Codeception\Specify\Config::setDeepClone(false);
