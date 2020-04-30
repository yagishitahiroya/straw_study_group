<!-- <div class="users form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<?= $this->Html->link('新規登録', ['controller' => 'users', 'action' => 'add']); ?>
    
    <fieldset>
        <legend>
            <?php echo __('ログイン'); ?>
        </legend>
        <?= $this->Form->input('username', ['label' => 'ユーザー名']);?>
        <?= $this->Form->input('password', ['label' => 'パスワード']);?>
    </fieldset>
    <?= $this->Form->button('ログイン');?>
    <?= $this->Form->end(); ?>
</div> -->

<div class = 'thread_action'>
    <h1>ログイン</h1>
</div>

<div class = "container">
    <?= $this->Flash->render('auth'); ?>
    <?= $this->Form->create('User'); ?>
    <?= "まだ登録してない方はこちら". $this->Html->link('新規登録', ['controller' => 'users', 'action' => 'add'],['class' => 'btn btn-secondary ml-2']); ?>

    <div class="form-group ">
    <?= $this->Form->input('username',['label' => ['text' => 'ユーザー名', 
                                    'for' => 'formGroupExampleInput'], 
                                    'class' => 'form-control', 
                                    'id' => 'formGroupExampleInput',
                                    'placeholder' => 'ユーザー名']);
    ?>
    </div>

    <div class="form-group ">
    <?= $this->Form->input('password',['label' => ['text' => 'パスワード', 
                                    'for' => 'formGroupExampleInput'], 
                                    'class' => 'form-control', 
                                    'id' => 'formGroupExampleInput',
                                    'placeholder' => 'パスワード']);
    ?>
    </div>

    <?= $this->Form->submit('ログイン', ["class"=>"btn btn-primary "]);?>
</div>
<?= $this->Form->end();?>