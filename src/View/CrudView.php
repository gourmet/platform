<?php
namespace App\View;

class CrudView extends \CrudView\View\CrudView
{

    /**
     * {@inheritdoc}
     */
    protected function _loadAssets()
    {
        // override to not load the CrudView assets.
    }
}
