<?php
use Cake\Core\Configure;
if (!isset($class)) {
    $class = ['navbar', 'navbar-default'];
}
$class = array_unique((array)$class + ['navbar']);
$container = (isset($fluid) && $fluid) ? '-fluid' : '';
$title = Configure::read('App.title');
?>

<nav class="<?= implode(' ', $class) ?>">

    <div class="container<?= $container ?>">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?= $this->Html->link($title, ['_name' => 'home'], ['class' => 'navbar-brand']) ?>

        </div>

        <div id="navbar" class="collapse navbar-collapse">
            
            <!-- TODO: add menu using gourmet/knp-menu -->

        </div>

    </div>

</nav>