<?php

use Cake\Core\Plugin;

Plugin::load('Crud');
Plugin::load('Robo', ['namespace' => 'Gourmet\\Robo', 'autoload' => true]);
Plugin::load('Whoops', ['namespace' => 'Gourmet\\Whoops', 'autoload' => true]);
