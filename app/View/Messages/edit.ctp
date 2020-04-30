<div class = 'thread_action'>
    <h1>メッセージを編集</h1>
</div>

<!-- <?= $this->Form->create('Message'); ?>
<?= $this->Form->input('body', ['label' => '編集中', 'textarea' => 'width:30px']); ?>
<?= $this->Form->input('id', ['type' => 'hidden']);?>
<?= $this->Form->submit('再投稿する');?>
<?= $this->Form->end();
?> -->

<div class = "container">
    <?= $this->Form->create('Message'); ?>

    <div class="form-group ">
    <?= $this->Form->input('body',['label' => ['text' => '編集中', 
                                    'for' => 'formGroupExampleInput'], 
                                    'class' => 'form-control', 
                                    'rows' => '4',
                                    'style' => 'width:660px',
                                    'wrap' => 'soft',
                                    'aria-describedby' => 'basic-addon1',
                                    'id' => 'formGroupExampleInput',
                                    'placeholder' => 'タイトル']);
    ?>
    </div>
    <?= $this->Form->submit('再投稿する', ["class"=>"btn btn-primary "]);?>
    <button type="button" onclick="history.back()" class = "btn btn-secondary">戻る</button>
    <!-- <?= $this->Html->link('戻る', ['onclick' => 'history.back()'],['class' => 'btn btn-secondary']); ?>   -->
    
</div>
<?= $this->Form->end();?>