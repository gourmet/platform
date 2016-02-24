<?php 
use Cake\Error\Debugger;

if (!empty($error->queryString)) {
    echo $this->Html->para(
        'notice', 
        '<strong>SQL Query:</strong> ' . h($error->queryString), 
        ['escape' => false]
    );
}

if (!empty($error->params)) {
    echo '<strong>SQL Query Params: </strong>';
    echo Debugger::dump($error->params);
}
