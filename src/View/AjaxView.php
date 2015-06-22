<?php
namespace App\View;

use Cake\Event\EventManager;
use Cake\Network\Request;
use Cake\Network\Response;

class AjaxView extends AppView
{

    /**
     * The name of the layout file to render the view inside of. The name specified
     * is the filename of the layout in /app/Template/Layout without the .ctp
     * extension.
     *
     * @var string
     */
    public $layout = 'ajax';

    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->response->type('ajax');
    }
}
