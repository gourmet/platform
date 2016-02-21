<?php
$title = sprintf('%s %s', $code, $message);

$description = '';
if ($code === 404) {
    $description = __("We couldn't find what you're looking for");
} elseif ($code === 403) {
    $description = __("Sorry! You don't have access for that on");
}

$this->Html->meta('description', $title, ['block' => 'meta']);
?>

<div class="container">

  <div class="jumbotron">

    <h1><?= $title ?></h1>

    <?php if ($description) echo $this->Html->para('lead', $description) ?>

    <p><em><?= $this->Url->build($url, true) ?></em></p>

    <p>
        <?php
        echo $this->Html->link(
            __('Take me to the homepage'), 
            ['_name' => 'home'], 
            ['class' => 'btn btn-default btn-lg']
        );
        ?>
    </p>

  </div>

</div>
