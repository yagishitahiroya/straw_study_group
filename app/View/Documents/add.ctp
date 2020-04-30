<!-- <fieldset>
<?= $this->Form->create('Document',['type'=>'file']); ?>
<?= $this->Form->input('title');?>
<?= $this->Form->input('details', ['rows' => '4']);?>
<?= $this->Form->file('filename'); ?>
<? //もしファイルがからならそこのデータ更新をしない　感想を追加?>
<?= $this->Form->submit('アップロード'); ?>
<?= $this->Form->end(); ?>
<?= $this->Html->link('👈戻る', ['controller' => 'documents','action' => 'index']); ?>
</fieldset> -->


<div class = "container">
    <?= $this->Form->create('Document',['type'=>'file']); ?>

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
    <div class="form-group">
        <?= $this->Form->file('filename',['class' => 'form-control-file', 'id' => 'exampleFormControlFile1']); ?>
    </div>
    <?= $this->Form->submit('保存', ["class"=>"btn btn-primary "]);?>
    <?= $this->Html->link('戻る', ['controller' => 'documents','action' => 'index'],['class' => 'btn btn-secondary']); ?>  
</div>
<?= $this->Form->end();?>