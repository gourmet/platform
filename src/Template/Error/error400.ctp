<?php
if (Cake\Core\Configure::read('debug')) {
    echo $this->element('Error/development', compact('code', 'message', 'url'));
    return;
}

$links = [
    'url' => $this->Html->link($this->Url->build($url, true), $url),
    'homepage' => $this->Html->link(__('homepage'), ['_name' => 'home']),
];
?>

    <div class="jumbotron"><div class="container">

        <h1><?= __("Oops!") ?></h1>

        <p><?= __("We couldn't find {url}.", $links) ?>
        <p><?= __("We apologize for the inconvenience. Go back to the {homepage}.", $links) ?></p>

    </div></div>
