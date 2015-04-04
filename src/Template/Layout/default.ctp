<!DOCTYPE html>

<?php
echo $this->fetch(
    'html',
    sprintf('<html lang="%s" class="no-js">', read('App.language'))
);
?>

    <head>

        <?= $this->Html->charset(); ?>

        <title>
            <?= $this->fetch('title', read('App.title', env('HTTP_HOST'))) ?>
        </title>

        <meta name="author" content="<?= read('App.author') ?>">
        <?= $this->fetch('meta') ?>


        <?= $this->AssetCompress->css('platform') ?>
        <?= $this->fetch('css'); ?>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    </head>

    <?= $this->fetch('body', '<body' . $this->fetch('bodyAttributes') . '>') ?>

        <?= $this->fetch('content'); ?>

        <footer id="footer" class="footer">

            <?= $this->fetch(
                'footer',
                sprintf(
                    '&copy;%s %s',
                    date('Y'),
                    read('App.title', env('HTTP_HOST'))
                )
            );
            ?>

        </footer>

        <?= $this->AssetCompress->script('platform') ?>
        <?= $this->fetch('script'); ?>

    </body>

</html>
