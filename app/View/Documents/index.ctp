<div class = "document">
<h1>資料管理</h1>
</div>



<!-- <?= $this->Html->link('ログアウト', ['controller' => 'users', 'action' => 'logout']); ?>  -->
<!-- <?php
    if ($auth) {
        echo 'ログインユーザ: ' . $auth['nickname'];
    }
?>
<table>
    <tr>
        <th>作成者</th>
        <th>タイトル</th>
        <th>詳細</th>
        <th>ファイル名</th>
        <th>作成時間</th>
        <th>編集時間</th>
        <th>アクション</th>
    </tr>
<?php foreach ($documents as $document): ?>
    <tr>
        <td><?= h($document['User']['nickname']);?></td>
        <td><?= $this->Html->link($document['Document']['title'],['controller' => 'thoughts', 'action' => 'view', $document['Document']['id']]);?></td>
        <td><?= $this->Text->truncate($document['Document']['details'], 50, ['ellipsis' => '...','exact' => true,'html' => true]);?></td>
        <td><?= $document['Document']['name'];?></td>

        <?php $format_date = strtotime(h($document['Document']['created'])); ?>
        <td><?= date('Y年m月d日 H時i分', $format_date); ?></td>

        <?php $format_date = strtotime(h($document['Document']['modified'])); ?>
        <td><?= date('Y年m月d日 H時i分', $format_date); ?></td>
        
        <td><?= $this->Html->link('ファイルダウンロード', ['action' => 'download',$document['Document']['filename'],$document['Document']['name']]);?></td>

        <?php if ($auth['id']=== $document['Document']['user_id']): ?>
        <td><?= $this->Html->link(' 編集', ['action' => 'edit',$document['Document']['id'], $document['Document']['user_id']]);?>
            <?= $this->Form->postLink('削除', 
                ['action' => 'delete', $document['Document']['id'],$document['Document']['user_id']], 
                ['confirm' => 'スレッドを削除するとコメントも削除されます。本当によろしいですか？'])
            ?>
        </td>
        <?php endif; ?>
    </tr>
<?php endforeach; ?>
</table> -->

<div class = "threads_add_btn col">
    <?= $this->Html->link('資料を置く', ['controller' => 'documents', 'action' => 'add'], ['class' => 'btn btn-info threads']); ?>
</div>

<table class ="table table-striped container">
<thead  style="background-color:#ffa9a9">
    <tr class="actions text-dark">
        <th>作成者</th>
        <th>タイトル</th>
        <th>ファイル名</th>
        <th>作成時間</th>
        <th>編集時間</th>
        <th>アクション</th>
    </tr>
</thead>

<?php foreach ($documents as $document): ?>
    <tr>
        <td><?= h($document['User']['nickname']);?></td>
        <td><?= $this->Html->link($document['Document']['title'],['controller' => 'thoughts', 'action' => 'view', $document['Document']['id']]);?></td>
        <!-- <td><?= $this->Text->truncate($document['Document']['details'], 50, ['ellipsis' => '...','exact' => true,'html' => true]);?></td> -->
        <td><?= $document['Document']['name'];?></td>

        <?php $format_date = strtotime(h($document['Document']['created'])); ?>
        <td><?= date('Y年m月d日 H時i分', $format_date); ?></td>

        <?php $format_date = strtotime(h($document['Document']['modified'])); ?>
        <td><?= date('Y年m月d日 H時i分', $format_date); ?></td>
        
        <td><p><?= $this->Html->link('ファイルダウンロード', ['action' => 'download',$document['Document']['filename'],$document['Document']['name']],['class' => 'btn btn-outline-secondary']);?></p>
        <?php if ($auth['id']=== $document['Document']['user_id']): ?>
        <?= $this->Html->link(' 編集', ['action' => 'edit',$document['Document']['id'], $document['Document']['user_id']],['class' => 'btn btn-outline-info']);?>
            <?= $this->Form->postLink('削除', 
                ['action' => 'delete', $document['Document']['id'],$document['Document']['user_id']],
                ['class' => 'btn btn-outline-danger'], 
                ['confirm' => 'スレッドを削除するとコメントも削除されます。本当によろしいですか？'])
            ?>
        </td>
        <?php endif; ?>
    </tr>
<?php endforeach; ?>
        
<?php unset($thread); ?>

</table>

<div class="pagination-thread text-center mt-3">
    <?= $this->Paginator->first('<<'); ?>
    <?= $this->Paginator->prev('< 前へ', [], null, ['class' => 'prev disabled']); ?>
    <?= $this->Paginator->numbers(['separator' => ''],['class'=>'mx-3']); ?>
    <?= $this->Paginator->next('次へ >', [], null, ['class' => 'next disabled']); ?>
    <?= $this->Paginator->last('>>') ?>
</div>