<!DOCTYPE html>
<html lang="<?= $htmlLang ?>" class="no-js">

    <head>

        <?= $this->Html->charset(); ?>
        <!--[if IE 9]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->

        <title>
            <?= $this->fetch('title', $htmlTitle) ?>
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="<?= $metaAuthor ?>">
        <?= $this->Html->meta('icon') ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('headjs') ?>

    </head>

    <?= $this->fetch('body', '<body' . $this->fetch('bodyAttributes') . '>') ?>

        <!--[if lt IE 9]>
            <?php
            echo $this->element('BootstrapUI.Flash/default', [
                'message' => $this->Html->div(null, __("
                    You are using an <strong>outdated</strong> browser.
                    Please {upgrade} to improve your experience.
                ", ['upgrade' => $this->Html->link(__('upgrade'), 'http://browsehappy.com')])),
                'params' => [
                    'class' => ['alert', 'alert-dismissible', 'alert-warning'],
                    'escape' => false,
                    'attributes' => ['attributes' => false],
                ]
            ]);
            ?>
        <![endif]-->

        <?= $this->fetch('content') ?>
        <?= $this->fetch('footer') ?>
        <?= $this->fetch('script'); ?>

    </body>

</html>
