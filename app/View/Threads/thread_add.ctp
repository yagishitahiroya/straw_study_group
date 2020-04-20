<h1>スレッドを立てる</h1>
<?php

echo $this->Form->create('Thread');
echo $this->Form->input('title');
echo $this->Form->input('details', ['rows' => '4']);
echo $this->Form->end('スレッドを保存しました');
echo $this->Html->link('👈戻る', ['action' => 'threads']); 