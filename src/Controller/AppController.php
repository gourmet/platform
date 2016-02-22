<?php
namespace App\Controller;

use App\Listener\ViewVarsListener;
use Cake\Controller\Controller;
use Crud\Controller\ControllerTrait;

class AppController extends Controller
{
    use ControllerTrait;

    /**
     * Tells if the CRUD listeners should be enabled.
     *
     * @var bool
     */
    public $isCrudEnabled = true;

    /**
     * Tells if CRUD view listener and view should be used.
     *
     * @var bool
     */
    public $isCrudViewEnabled = true;

    /**
     * Tells if the CRUD API listeners should be enabled.
     *
     * @var bool
     */
    public $isCrudApiEnabled = false;

    /**
     * {@inheritdoc}
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler');

        $this->_setupCrud();

        $this->eventManager()->on(new ViewVarsListener());
    }

    protected function _setupCrud()
    {
        if (!$this->isCrudEnabled) {
            return;
        }

        $this->loadComponent('Crud.Crud', [
            'listeners' => [
                'Crud.Redirect',
                'Crud.RelatedModels',
            ]
        ]);

        $this->_setupCrudView();
        $this->_setupCrudApi();
    }

    protected function _setupCrudView()
    {
        if (!$this->isCrudViewEnabled) {
            return;
        }

        $this->Crud->addListener('CrudView.View');
        $this->viewBuilder()
            ->className('CrudView.Crud')
            ->layout('default');
    }

    protected function _setupCrudApi()
    {
        if (!$this->isCrudApiEnabled) {
            return;
        }

        $this->Crud->addListener('Crud.Api');
        $this->Crud->addListener('Crud.ApiPagination');
        $this->Crud->addListener('Crud.ApiQueryLog');
    }
}
