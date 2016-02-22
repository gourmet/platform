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

            <?= $this->Html->link($brand, ['_name' => 'home'], ['class' => 'navbar-brand']) ?>

        </div>

        <div id="navbar" class="collapse navbar-collapse">
            
            <?php try { // wrap in try/catch to make sure it never fails (i.e. missing route) ?>
                <!-- TODO: add menu using gourmet/knp-menu -->
            <?php } catch (\Exception $e) { if (Configure::read('debug')) throw $e; } ?>

        </div>

    </div>

</nav>