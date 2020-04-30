
<div class = 'thread_action'>
    <h1>スレッドを編集</h1>
</div>

<!-- <?= $this->Form->create('Thread'); ?>
<?if ($auth):?>
<?='ユーザ名: ' . $auth['nickname'];?>
<? endif;?>

<?= $this->Form->input('title');?>
<?= $this->Form->input('details', ['rows' => '4']);?>
<?= $this->Form->submit('再投稿する');?>
<?= $this->Form->end();?>
<?= $this->Html->link('👈戻る', ['action' => 'threads']); ?> -->


<div class = "container">
    <?=$this->Form->create('Thread');?>

    <div class="form-group ">
    <?= $this->Form->input('title',['label' => ['text' => 'タイトル', 
                                    'for' => 'formGroupExampleInput'], 
                                    'class' => 'form-control', 
                                    'id' => 'formGroupExampleInput',
                                    'placeholder' => 'タイトル']);
    ?>
    </div>
    <div class="form-group">
    <?= $this->Form->input('details',['label' => ['text' => '詳細', 
                                        'for' => 'formGroupExampleInput2'], 
                                        'rows' => '4',
                                        'class' => 'form-control',
                                        'id' => 'formGroupExampleInput2',
                                        'placeholder' => 'タイトル']);
    ?>
    </div>
    <?= $this->Form->submit('スレッドを編集する', ["class"=>"btn btn-primary "]);?>
    <?= $this->Html->link('戻る', ['action' => 'threads'],['class' => 'btn btn-secondary']); ?>  
</div>
<?= $this->Form->end();?>