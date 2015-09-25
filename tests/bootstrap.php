<?php
/**
 * Test runner bootstrap.
 *
 * Add additional configuration/setup your application needs when running
 * unit tests in this file.
 */
require dirname(__DIR__) . '/bootstrap/start.php';
require 'constants.php';

// disable deep cloning of properties inside specify blocks
\Codeception\Specify\Config::setDeepClone(false);
