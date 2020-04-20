
<section>
    <h3><?= h($thread['Thread']['title']); ?></h3>
    <p><?= h($thread['Thread']['details']); ?></p>

</section>

<section>
<?php foreach ($messages as $message): ?>
    <p><?= h($message['Message']['body']); ?></p>
    <small><?= h($message['Message']['created']);?></small>
<?php endforeach;?>
</section>

