<div class = 'thread_action'>
    <h1>資料詳細</h1>
</div>

<?= $this->Html->link('資料一覧に戻る', ['controller' => 'documents' ,'action' => 'index'],['class' => 'btn btn-secondary chat_re']);?>


<!-- <section>
    <h3><?= h($document['Document']['title']); ?></h3>
    <p><?= h($document['Document']['details']); ?></p>
    <p><h5><?= $this->Html->link('ファイルダウンロード', ['action' => 'download',$document['Document']['filename']]);?></h5></p>
</section> -->

<div class="row mt-5">
    <div class="col-md-9 mx-auto">
        <div class="card ">
            <div class="card-header">
                <?= h($document['User']['nickname'])?>
            </div>
            <div class="card-body">
                <h4 class="card-title"><?= h($document['Document']['title']); ?></h4>
                <p class="card-text"><?= h($document['Document']['details']); ?></p>
                <?= h($document['Document']['name']);?> :
                <?= $this->Html->link('ファイルダウンロード', ['controller' => 'documents','action' => 'download',$document['Document']['filename'],$document['Document']['name']],['class' => 'btn btn-outline-secondary']);?>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-9 mx-auto">
        <div class="card ">
            <div class="card-header">
                <div class = "left">この資料に関する感想</div> 
                    <div class = "right">
                        <?= $this->Html->link('感想を投稿', ['action' => 'add',$document['Document']['id']],
                                                            ['class' => 'btn btn-info']);                            
                        ?>
                    </div>
            </div>
            <!-- 'data-toggle' => 'modal', 'data-target' => '#exampleModal3'
            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">感想を投稿する</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?= $this->Form->create('Thought', ['url' => 'add']); ?>
                        <div class="modal-body">
                        <?= $this->Form->input('body',['label' => ['text' => ' ', 
                                        'for' => 'formGroupExampleInput2'], 
                                        'rows' => '4',
                                        
                                        'style' => 'height:500px width:1000px',
                                        'class' => 'form-control',
                                        'id' => 'formGroupExampleInput2',
                                        'placeholder' => '感想']);
                        ?>
                        <?= $this->Form->hidden('document_id', ['value' => $newThoughts]);?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <?= $this->Form->submit('投稿する', ['class' => 'btn btn-success']); ?>
                            <?= $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>


<!-- <section>
<?php foreach ($thoughts as $thought): ?>
    <p><h3><?= h($thought['Thought']['body']); ?><h3></p>
    <?php $format_date = strtotime(h($thought['Thought']['created'])); ?>
    <div>
        <small><?= date('Y年m月d日 H時i分', $format_date);?></small>
        <small><?= $this->Html->link('編集', ['action' => 'edit', $thought['Thought']['id'], $thought['Thought']['document_id']]);?></small>
        <small><?= $this->Form->postLink('削除', ['action' => 'delete', $thought['Thought']['id'], $thought['Thought']['document_id']],
                                        ['confirm' => '本当にいいですか？']);?>
        </small>
    </div>
    
<?php endforeach;?>
</section> -->
<?php foreach ($thoughts as $thought): ?>
<div class="card row mt-4 col-md-9 mx-auto">
    <div class="card-body">
    
        <h4 class="card-title"><?= h($thought['User']['nickname']); ?></h4>
        <?php $format_date = strtotime(h($thought['Thought']['created'])); ?>
        <h6 class="card-subtitle mb-2 text-muted"><?= date('Y年m月d日 H時i分', $format_date);?></h6>
        <p class="card-text ">
            <?= nl2br(h($thought['Thought']['body'])); ?>
        </p>
        <?php if ($auth['id']=== $thought['Thought']['user_id']): ?>
        <?= $this->Html->link('編集', ['action' => 'edit', $thought['Thought']['id'], $thought['Thought']['document_id']],['class' => 'btn btn-outline-info card-link']);?>
        <?= $this->Form->postLink('削除', ['action' => 'delete', $thought['Thought']['id'], $thought['Thought']['document_id']],
                                        ['class' => 'btn btn-outline-danger card-link'],['confirm' => '本当にいいですか？']);?>
        
        <?php endif;?>
    </div>
</div>
<?php endforeach;?>
<p id="page-top"><a href="#">PAGE TOP</a></p>