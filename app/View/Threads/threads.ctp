<h1>Blog posts</h1>
<?= $this->Html->link('スレッドを立てる', ['controller' => 'threads', 'action' => 'thread_add']); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($threads as $thread): ?>
    <tr>
        <td><?php echo $thread['Thread']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($thread['Thread']['title'],
array('controller' => 'messages', 'action' => 'view', $thread['Thread']['id'])); ?>
        </td>
        <td><?php echo $thread['Thread']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($thread); ?>
</table>