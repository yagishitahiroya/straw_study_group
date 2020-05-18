<div class = 'thread_action'>
    <h1>スレッドを立てる</h1>
</div>
<!-- <?if ($auth):?>
<?='ユーザ名: ' . $auth['nickname'];?>
<? endif;?> -->

<!-- <?=$this->Form->create('Thread');?>

<?= $this->Form->input('title',['label' => ['text' => 'タイトル']]);?>
<?= $this->Form->input('details', ['rows' => '4']);?>
<?= $this->Form->end('スレッドを保存しました', ["class"=>"btn btn-blue"]);?> -->


<div class = "container">
    <?=$this->Form->create ('Thread');?>

    <div class="form-group ">
    <?= $this->Form->input ('type',[
        'label' => 'スレッドタイプ',
        'type' => 'select',
        'options' => [
            'したい' => 'したい',
            'できる' => 'できる',
        ],
        'empty' => '選択してください'
    ]);
    ?>
    </div>

    <div class="form-group ">
    <?= $this->Form->input ('title',['label' => ['text' => 'タイトル', 
                                    'for' => 'formGroupExampleInput'], 
                                    'class' => 'form-control', 
                                    'id' => 'formGroupExampleInput',
                                    'placeholder' => 'タイトル']);
    ?>
    </div>
    <div class="form-group">
    <?= $this->Form->input ('details',['label' => ['text' => '詳細', 
                                        'for' => 'formGroupExampleInput2'], 
                                        'rows' => '4',
                                        'class' => 'form-control',
                                        'id' => 'formGroupExampleInput2',
                                        'placeholder' => 'タイトル']);
    ?>
    </div>
    <?= $this->Form->submit ('スレッドを立てる', ["class"=>"btn btn-primary "]);?>
    <?= $this->Html->link ('戻る', ['action' => 'threads'],['class' => 'btn btn-secondary']); ?>  
</div>
<?= $this->Form->end();?>

