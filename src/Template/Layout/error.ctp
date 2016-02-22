<?php
$this->extend('base');

$this->reset('css');
$this->reset('headjs');
$this->reset('script');

$this->assign('title', read('App.title'));

$this->Html->css('bootstrap', ['block' => true]);

echo $this->element('Layout/header');
echo $this->fetch('content');
