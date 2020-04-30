<h1><?= h($document['Document']['title']); ?></h1>

<p><h3><?= h($document['Document']['details']); ?></h3></p>
<p><small><?= h($document['Document']['filename']);?></small></p>
<p><?= $this->Html->image('uploads'.DS.$document['Document']['filename'],['width'=>'500','height'=>'250']); ?></p>
<p><small><?= h($document['Document']['filetype']);?></small></p>
<p><h5><?= $this->Html->link('ファイルダウンロード', ['action' => 'download',$document['Document']['filename']]);?></h5></p>
<?= $this->Html->link('👈戻る', ['controller' => 'documents','action' => 'index']); ?>
