<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\NotFoundException;
use Cake\Utility\Debugger;
use Cake\Validation\Validation;

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

if (Plugin::loaded('TwitterBootstrap')) {
	$this->extend('TwitterBootstrap.Layout/default');
}

$this->Html->css('rewrite.css', ['block' => true]);
Debugger::checkSecurityKeys();
?>

<h1>Gourmet <span class="small">/ɡɔrˈmeɪ/</span></h1>

<blockquote>
	<p>
		[...] a cultural ideal associated with the culinary arts of fine
		food and drink, or haute cuisine, which is characterised by refined,
		even elaborate preparations and presentations of aesthetically
		balanced meals of several contrasting, often quite rich courses [...]
	</p>
	<footer><cite title="Wikipedia">Wikipedia</cite></footer>
</blockquote>

<?php
echo $this->Html->div(
	'alert alert-danger',
	'<h4>URL rewrite issue.</h4>' .
	'URL rewriting is not properly configured on your server.' .
	'<br>' .
	'1) ' .
		$this->Html->link(
			'Help me configure it',
			'http://book.cakephp.org/3.0/en/installation/url-rewriting.html',
			['class' => 'alert-link', 'target' => '_blank']
		) .
	'<br>' .
	'2) ' .
		$this->Html->link(
			'I don\'t / can\'t use URL rewriting',
			'http://book.cakephp.org/3.0/en/development/configuration.html#general-configuration',
			['class' => 'alert-link', 'target' => '_blank']
		),
	['id' => 'url-rewriting-warning']
);

if (!is_writable(TMP)) {
	echo $this->Html->div(
		'alert alert-warning',
		'<h4>Permissions issue.</h4>' .
		'Your tmp directory is NOT writable'
	);
}

$settings = Cache::config('_cake_model_');
if (empty($settings)) {
	echo $this->Html->div(
		'alert alert-warning',
		'<h4>Cache issue.</h4>' .
		'Cache is NOT working. Please check the settings in ' .
		'<code>App/Config/cache.php</code>'
	);
}

try {
	$connection = ConnectionManager::getDataSource('default');
	$connected = $connection->connect();
} catch (Exception $connectionError) {
	$connected = false;
	$errorMsg = $connectionError->getMessage();
	if (method_exists($connectionError, 'getAttributes')):
		$attributes = $connectionError->getAttributes();
		if (isset($errorMsg['message'])):
			$errorMsg .= '<br />' . $attributes['message'];
		endif;
	endif;
}
if (!$connected) {
	echo $this->Html->div(
		'alert alert-warning',
		'<h4>Database issue.</h4>' .
		'Unable to connect to the database. ' . $errorMsg
	);
}

if (!Validation::alphaNumeric('cakephp')) {
	echo $this->Html->div(
		'alert alert-warning',
		'<h4>PCRE issue.</h4>' .
		'PCRE has not been compiled with Unicode support. Recompile PCRE with' .
		'Unicode support by adding <code>--enable-unicode-properties</code> ' .
		'when configuring.'
	);
}
