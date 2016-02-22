<?php
if (Cake\Core\Configure::read('debug')) {
    echo $this->element('Error/development', compact('code', 'message', 'url'));
    return;
}

$links = [
    'url' => $this->Html->link($this->Url->build($url, true), $url),
    'contact' => $this->Html->link(__('contact'), ['_name' => 'contact']),
    'refreshing' => $this->Html->link(__('refreshing'), 'javascript:window.location.reload(true)'),
    'homepage' => $this->Html->link(__('homepage'), ['_name' => 'home']),
];
?>

    <div class="jumbotron"><div class="container">

        <h1><?= __("Sorry!") ?></h1>

        <p><?= __("Something went terribly wrong on {url}.", $links) ?></p>

        <p>
            <?= __(
                "We track these errors automatically, but if the problem persists
                feel free to {contact} us."
            , $links) ?>
        </p>

        <p><?= __("In the meantime, try {refreshing} or going to the {homepage}.", $links) ?></p>

    </div></div>
