<?php

namespace App\Controller;

use Cake\Event\Event;
use Crud\Controller\ControllerTrait;

/**
 * Extends `App\Controller\AppController` for `friendsofcake/crud`-enabled controllers.
 */
class CrudController extends AppController
{
    use ControllerTrait;

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->_setupCrud();
    }

    /**
     * Sets up the `friendsofcake/crud` component.
     *
     * @return void
     */
    protected function _setupCrud()
    {
        $this->loadComponent('Crud.Crud', [
            'actions' => [
                'Crud.Index',
                'Crud.Add',
                'Crud.Edit',
                'Crud.View',
                'Crud.Delete',
            ]
        ]);

        $this->_bootstrapifyCrudFlashMessage();
    }

    /**
     * Attaches to the `setFlash` event to customize the element used by flash
     * messages and seamlessly work with `friendsofcake/bootstrap-ui`.
     *
     * @return void
     */
    protected function _bootstrapifyCrudFlashMessage()
    {
        $this->Crud->on('setFlash', function (Event $event) {
            unset($event->subject->params['class']);
            $event->subject->element = ltrim($event->subject->type);
        });
    }
}
