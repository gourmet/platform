<?php

use Cake\Routing\DispatcherFactory;

/**
 * Connect middleware/dispatcher filters.
 */
DispatcherFactory::add('Asset');
DispatcherFactory::add('Cache');
DispatcherFactory::add('Routing');
DispatcherFactory::add('ControllerFactory');
