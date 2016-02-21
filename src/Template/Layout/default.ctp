<?php
$this->extend('base');

$this->AssetCompress->css('platform', ['block' => true]);
$this->AssetCompress->script('platform', ['block' => true]);

echo $this->Flash->render();
echo $this->fetch('content');