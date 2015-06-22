<?php
namespace App\View;

use Cake\View\View;

class AppView extends View
{
    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function initialize()
    {
        $this->_setupAssetCompress();
        $this->_setupBootstrapUI();
    }

    /**
     * Load the AssetCompress helper.
     *
     * @return void
     */
    protected function _setupAssetCompress()
    {
        $this->loadHelper('AssetCompress.AssetCompress');
    }

    /**
     * Load the BootstrapUI helpers.
     *
     * @return void
     */
    protected function _setupBootstrapUI()
    {
        $helpers = ['Flash', 'Form'];
        foreach ($helpers as $helper) {
            $this->loadHelper($helper, [
                'className' => 'BootstrapUI.' . $helper,
            ]);
        }
    }
}
