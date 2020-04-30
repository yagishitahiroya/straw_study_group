<div class = 'thread_action'>
    <h1>感想を編集</h1>
</div>
<!-- <?= $this->Form->create('Thought'); ?>
<?= $this->Form->input('body', ['label' => '編集中', 'textarea' => 'width:30px']); ?>
<?= $this->Form->input('id', ['type' => 'hidden']);?>
<?= $this->Form->submit('再投稿する');?>
<?= $this->Form->end();
?> -->

<div class = "container ">
    <?=$this->Form->create('Thought');?>

    
    <div class="form-group">
    <?= $this->Form->input('body',['label' => ['text' => '', 
                                        'for' => 'formGroupExampleInput2'], 
                                        'rows' => '4',
                                        'style' => 'width:1020px',
                                        'class' => 'form-control h5',
                                        'id' => 'formGroupExampleInput2',
                                        'placeholder' => '詳細']);
    ?>
    <?= $this->Form->input('id', ['type' => 'hidden']);?>
    </div>
    <?= $this->Form->submit('再投稿する', ["class"=>"btn btn-primary "]);?>
    <button type="button" onclick="history.back()" class = "btn btn-secondary">戻る</button>
</div>
<?= $this->Form->end();?>