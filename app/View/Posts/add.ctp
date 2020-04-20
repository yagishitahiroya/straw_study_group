<?php

echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
echo $this->Html->link('👈戻る', array('action' => 'index')); 
?>