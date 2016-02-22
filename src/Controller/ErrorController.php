<?php
namespace App\Controller;

use App\Listener\ViewVarsListener;

/**
 * Error controller is used to override the core's provided one to:
 * 
 *     - force the use of `error` layout
 *     - attach the `ViewVarsListener`
 *
 */ 
class ErrorController extends \Cake\Controller\ErrorController
{

    /**
     * {@inheritdoc}
     */
    public function initialize()
    {
        $this->viewBuilder()->layout('error');
        $this->eventManager()->on(new ViewVarsListener());
    }
}