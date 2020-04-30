<!-- <div class="users form">
<?= $this->Form->create('User'); ?>
<?= $this->Html->link('ログイン', ['controller' => 'users', 'action' => 'login']); ?>

    <fieldset>
        <legend><?= __('ユーザー登録'); ?></legend>
        <?= $this->Form->input('username', ['label' => 'ユーザー名']);?>
        <?= $this->Form->input('nickname', ['label' => 'ニックネーム']);?>
        <?= $this->Form->input('password', ['label' => 'パスワード']);?>
        
    
    </fieldset>
    <?= $this->Form->button('登録する');?>
    <?= $this->Form->end(); ?>
</div> -->

<div class = 'thread_action'>
    <h1>新規登録</h1>
</div>

<div class = "container">
    <?= $this->Form->create('User'); ?>
    <?= $this->Html->link('ログインする', ['controller' => 'users', 'action' => 'login'],['class' => 'btn btn-secondary ml-2']); ?>

    <div class="form-group ">
    <?= $this->Form->input('username',['label' => ['text' => 'ユーザー名', 
                                    'for' => 'formGroupExampleInput'], 
                                    'class' => 'form-control', 
                                    'id' => 'formGroupExampleInput',
                                    'placeholder' => 'ユーザー名']);
    ?>
    </div>

    <div class="form-group ">
    <?= $this->Form->input('nickname',['label' => ['text' => 'ニックネーム', 
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

    <?= $this->Form->submit('登録', ["class"=>"btn btn-primary "]);?>
</div>
<?= $this->Form->end();?>