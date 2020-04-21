
<section>
    <h3><?= h($thread['Thread']['title']); ?></h3>
    <p><?= h($thread['Thread']['details']); ?></p>

</section>

<section>
<?php foreach ($messages as $message): ?>
    <p><h3><?= h($message['Message']['body']); ?><h3></p>
    <?php $format_date = strtotime(h($message['Message']['created'])); ?>
    <div>
        <small><?= date('Y年m月d日 H時i分', $format_date);?></small>
        <small><?= $this->Html->link('編集', ['action' => 'edit', $message['Message']['id'], $message['Message']['thread_id']]);?></small>
        <small><?= $this->Form->postLink('削除', ['action' => 'delete', $message['Message']['id'], $message['Message']['thread_id']],
                                        ['confirm' => '本当にいいですか？']);?>
        </small>
    </div>
    
<?php endforeach;?>
</section>

<section>
    
    <?= $this->Form->create('Message', ['url' => 'add']); ?>
    <?= $this->Form->input('body', ['label' => '投稿する', 'textarea' => 'width:30px']); ?>
    <?= $this->Form->hidden('thread_id', ['value' => $newMessages]);?>
    <?= $this->Form->submit('投稿する'); ?>
    <?= $this->Form->end(); ?>
</section>

<?= $this->Html->link('👈スレッド一覧に戻る', ['controller' => 'threads' ,'action' => 'threads']);