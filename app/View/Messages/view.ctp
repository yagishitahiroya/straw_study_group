<div class = "thread">
<h1>要望詳細</h1>
</div>
<!-- <?= $this->Html->link('ログアウト', ['controller' => 'users', 'action' => 'logout']); ?>
<?= $this->Html->link('資料管理', ['controller' => 'documents', 'action' => 'index']); ?>
<?php
    if ($auth) {
        echo 'ログインユーザ: ' . $auth['nickname'];
    }
?> -->
<?= $this->Html->link('スレッド一覧に戻る', ['controller' => 'threads' ,'action' => 'threads'],['class' => 'btn btn-secondary chat_re']);?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card ">
            <div class="card-header">
                <?= h($thread['User']['nickname'])?>
            </div>
            <div class="card-body">
                <h4 class="card-title"><?= h($thread['Thread']['title']); ?></h4>
                <p class="card-text"><?= h($thread['Thread']['details']); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row chat_margin ">
<div class="col-md-6 mx-auto">
        <?php foreach ($messages as $message): ?>
        <div class="balloon6 mx-auto">
            <div class="faceicon">
                <?= h($message['User']['nickname']); ?>
            </div>
            <div class="chatting">
                <div class="says shadow-sm">
                    <p><?= nl2br(h($message['Message']['body'])); ?></p>
                </div>
                <div>
                    <?php $format_date = strtotime(h($message['Message']['created'])); ?>
                    <small><?= date('Y年m月d日 H時i分', $format_date);?></small>
                </div>
                
            </div>
        </div>
        <div class="mycomment">
            <?php if ($auth['id']=== $message['Message']['user_id']): ?>
                <small><?= $this->Html->link('編集', ['action' => 'edit', $message['Message']['id'], $message['Message']['thread_id'],
                                                    $message['Message']['user_id']],['class' => 'btn btn-outline-info']);
                        ?>
                </small>
                <small><?= $this->Form->postLink('削除', ['action' => 'delete', $message['Message']['id'], $message['Message']['thread_id'],$message['Message']['user_id']],
                                                        ['class' => 'btn btn-outline-danger'],['confirm' => '本当にいいですか？']);
                        ?>
                </small> 
            <?php endif;?>
        </div>
        <?php endforeach;?>
    </div>
</div>









<?php foreach ($messages as $message): ?>
    <!-- <p><small><?= h($message['User']['nickname']); ?></small></p> 
    <p><h3><?= h($message['Message']['body']); ?><h3></p>  -->
    <!-- <?php $format_date = strtotime(h($message['Message']['created'])); ?> -->
    <!-- <small><?= date('Y年m月d日 H時i分', $format_date);?></small> -->
    <!-- <?php if ($auth['id']=== $message['Message']['user_id']): ?> -->

        <!-- <small><?= $this->Html->link('編集', ['action' => 'edit', $message['Message']['id'], $message['Message']['thread_id'],$message['Message']['user_id']]);?></small> -->
        <!-- <small><?= $this->Form->postLink('削除', ['action' => 'delete', $message['Message']['id'], $message['Message']['thread_id'],$message['Message']['user_id']],
                                        ['confirm' => '本当にいいですか？']);?>
        </small> -->

    <?php endif;?>
<?php endforeach;?>
    


<!-- <section>
    
    <?= $this->Form->create('Message', ['url' => 'add']); ?>
    <?= $this->Form->input('body', ['label' => '投稿する', 'textarea' => 'width:30px']); ?>
    <?= $this->Form->hidden('thread_id', ['value' => $newMessages]);?>
    <?= $this->Form->submit('投稿する'); ?>
    <?= $this->Form->end(); ?>
</section> -->

<div class="row fixed-bottom mb-3">
    <div class="col-md-6 mx-auto">
        <div class="input-group">
        <?= $this->Form->create('Message', ['url' => 'add']); ?>
            <?= $this->Form->input('body', ['label' => '','rows' => '2','wrap' => 'soft','class' => 'form-control', 'style' => 'width:660px',
                                            'aria-describedby' => 'basic-addon1']); ?>
            <?= $this->Form->hidden('thread_id', ['value' => $newMessages]);?>
            <div class="input-group-append">
                <?= $this->Form->submit('投稿する',['class' => 'btn btn-success']); ?>
                <?= $this->Form->end(); ?>
            </div>
            <p id="page-top"><a href="#">PAGE TOP</a></p>
        </div>
    </div>
</div>
