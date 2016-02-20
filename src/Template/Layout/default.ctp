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

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <?= $this->fetch('body', '<body' . $this->fetch('bodyAttributes') . '>') ?>

        <?= $this->fetch('content') ?>
        <?= $this->fetch('footer') ?>
        <?= $this->AssetCompress->script('platform') ?>
        <?= $this->fetch('script'); ?>

    </body>

</html>
