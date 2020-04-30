<div class = 'thread_action'>
    <h1>感想</h1>
</div>

<div class = "container">
    <?=$this->Form->create('Thought');?>

    
    <div class="form-group">
    <?= $this->Form->input('body',['label' => ['text' => '', 
                                        'for' => 'formGroupExampleInput2'], 
                                        'rows' => '4',
                                        'style' => 'width:1020px',
                                        'class' => 'form-control',
                                        'id' => 'formGroupExampleInput2',
                                        'placeholder' => '詳細']);
    ?>
    </div>
    <?= $this->Form->submit('感想を投稿する', ["class"=>"btn btn-primary "]);?>
    <button type="button" onclick="history.back()" class = "btn btn-secondary">戻る</button>
</div>
<?= $this->Form->end();?>