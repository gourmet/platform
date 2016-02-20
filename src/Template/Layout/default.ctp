<!DOCTYPE html>
<html lang="<?= \Locale::getPrimaryLanguage(\Cake\I18n\I18n::locale()) ?>">

    <head>

        <?= $this->Html->charset(); ?>

        <title>
            <?= $this->fetch('title', read('App.title', env('HTTP_HOST'))) ?>
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="<?= read('App.author') ?>">
        <?= $this->Html->meta('icon') ?>
        <?= $this->fetch('meta') ?>
        <?= $this->AssetCompress->css('platform') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('headjs') ?>

    </head>

    <?= $this->fetch('body', '<body' . $this->fetch('bodyAttributes') . '>') ?>

        <?= $this->fetch('content') ?>
        <?= $this->fetch('footer') ?>
        <?= $this->AssetCompress->script('platform') ?>
        <?= $this->fetch('script'); ?>

    </body>

</html>
