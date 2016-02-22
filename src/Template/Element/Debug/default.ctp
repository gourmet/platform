<?php
$this->layout = 'dev_error';
$this->assign('title', $message);
$this->assign('templateName', sprintf('error%s00.ctp', (string)$code[0]);
$this->start('file');
echo $this->element('Error/sql', compact('error'));
echo $this->element('auto_table_warning');
echo $this->element('Error/xdebug');
$this->end();
