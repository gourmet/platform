<?php
namespace App\Controller;

/**
 * Error controller is used to override the core's provided one to:
 * 
 *     - force the use of `error` layout
 *
 */ 
class ErrorController extends \Cake\Controller\ErrorController
{

    /**
     * {@inheritdoc}
     */
    public $layout = 'error';
}