<?php
$this->extend('base');

$this->reset('css');
$this->reset('headjs');
$this->reset('script');

$this->Html->css('bootstrap', ['block' => true]);

echo $this->fetch('content');
