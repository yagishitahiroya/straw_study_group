<div class = "thread">
<h1>したい＆できる</h1>
</div>

<div class = "threads_add_btn container">
    <?= $this->Html->link('新規のスレッドを立てる', ['controller' => 'threads', 'action' => 'add'], ['class' => 'btn btn-info threads']); ?>
</div>
<!-- <?php
    if ($auth) {
        echo 'ログインユーザ: ' . $auth['nickname'];
    }
?>
<table> -->
    <!-- <tr>
        <th>作成者</th>
        <th>タイトル</th>
        <th>作成時間</th>
        <th>アクション</th>
    </tr> -->

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <!-- <?php foreach ($threads as $thread): ?> -->
        
    <!-- <tr>
        <td><?= h($thread['User']['nickname'])?></td>
        <td>
            <?= $this->Html->link($thread['Thread']['title'],
['controller' => 'messages', 'action' => 'view', $thread['Thread']['id']]); ?>
        </td>

        <?php $format_date = strtotime(h($thread['Thread']['created'])); ?>
        <td>
            <?= date('Y年m月d日 H時i分', $format_date); ?>
        </td>
        <?php if ($auth['id']=== $thread['Thread']['user_id']): ?>
        <td>
            <?= $this->Html->link('編集', ['action' => 'edit', $thread['Thread']['id'],$thread['Thread']['user_id']]); ?>
            <?= $this->Form->postLink('削除', 
                ['action' => 'delete', $thread['Thread']['id'],$thread['Thread']['user_id']], 
                ['confirm' => 'スレッドを削除するとコメントも削除されます。本当によろしいですか？'])
            ?>
        </td>
        <?php endif;?>
    </tr>
    <?php endforeach; ?>
        
    <?php unset($thread); ?>
</table> -->




<?php foreach ($threads as $thread): ?>
<div class="list-group container  list-group-item list-group-item-action flex-column align-items-start">
    <?= h($thread['User']['nickname'])?>    
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1"><?= $this->Html->link($thread['Thread']['title'],['controller' => 'messages', 'action' => 'view', $thread['Thread']['id']]); ?></h5>

        <?php $format_date = strtotime(h($thread['Thread']['created'])); ?>
        <small><?= h(date('Y年m月d日 H時i分', $format_date)); ?></small>
        
    </div>
    <p class="mb-1"><?= h($thread['Thread']['details']);?></p>
    <?php if ($auth['id']=== $thread['Thread']['user_id']): ?>
        <div class="d-flex justify-content-between">
        <p></p>
        <div>
        <?= $this->Html->link('編集', ['action' => 'edit', $thread['Thread']['id'],$thread['Thread']['user_id']],['class' => 'btn btn-outline-info']); ?>
        <?= $this->Form->postLink('削除', 
                ['action' => 'delete', $thread['Thread']['id'],$thread['Thread']['user_id']], 
                ['class' => 'btn btn-outline-danger'],['confirm' => 'スレッドを削除するとコメントも削除されます。本当によろしいですか？'])
            ?>
        </div>
            
        </div>
        <?php endif;?>
</div>
<?php endforeach; ?>

        <div class="pagination-thread text-center mt-3">
        <?= $this->Paginator->first('<<'); ?>
        <?= $this->Paginator->prev('< 前へ', [], null, ['class' => 'prev disabled']); ?>
        <?= $this->Paginator->numbers(['separator' => ''],['class'=>'mx-3']); ?>
        <?= $this->Paginator->next('次へ >', [], null, ['class' => 'next disabled']); ?>
        <?= $this->Paginator->last('>>') ?>
        </div>
        
