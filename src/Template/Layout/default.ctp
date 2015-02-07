<?php
/**
 * Default `html` block.
 */
if (!$this->fetch('html')) {
    $this->start('html');
    printf('<html lang="%s" class="no-js">', read('App.language'));
    $this->end();
}

/**
 * Default `title` block.
 */
if (!$this->fetch('title')) {
    $this->start('title');
    echo read('App.title', env('HTTP_HOST'));
    $this->end();
}

/**
 * Default `footer` block.
 */
if (!$this->fetch('footer')) {
    $this->start('footer');
    printf('&copy;%s %s', date('Y'), read('App.title', env('HTTP_HOST')));
    $this->end();
}

/**
 * Default `body` block.
 */
$this->prepend('bodyAttributes', ' class="' . implode(' ', array($this->request->controller, $this->request->action)) . '" ');
if (!$this->fetch('body')) {
    $this->start('body');
    echo '<body' . $this->fetch('bodyAttributes') . '>';
    $this->end();
}

/**
 * Prepend `meta` block with `author` and `favicon`.
 */
$this->prepend('meta', $this->Html->meta('author', null, array('name' => 'author', 'content' => read('App.author'))));
$this->prepend('meta', $this->Html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon')));

/**
 * Prepend `css` block with TwitterBootstrap and Bootflat stylesheets and append
 * the `$html5Shim`.
 */
$html5Shim =
<<<HTML
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
HTML;
// $this->prepend('css', $this->Assetic->css(['bootstrap/bootstrap']));
// $this->append('css', $html5Shim);

// $this->prepend('script', $this->Assetic->script(['jquery/jquery', 'bootstrap/bootstrap']));

?>
<!DOCTYPE html>

<?= $this->fetch('html'); ?>

    <head>

        <?= $this->Html->charset(); ?>

        <title><?= $this->fetch('title'); ?></title>

        <?= $this->fetch('meta'); ?>
        <?= $this->fetch('css'); ?>

    </head>

    <?= $this->fetch('body'); ?>

        <?= $this->fetch('content'); ?>

        <footer id="footer" class="footer">

            <?= $this->fetch('footer'); ?>

        </footer>

        <?= $this->fetch('script'); ?>

    </body>

</html>
