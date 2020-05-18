
<!-- <?php $searchLike = array_search($auth['id'], array_column($likes_data, 'user_id'),true) ?> -->
<!-- <?php $searchLike =  array_search($auth['id'],$likes_data);?> -->

<!-- <?php $this->log($searchLike, LOG_DEBUG);?> -->
<?php $searchLike = in_array($want['Thread']['id'], $likes_data);?>
<!-- <?php $this->log($likes_data, LOG_DEBUG);?> -->
<?php if ($searchLike === false) : ?>
    <div class="like" id="addfavorite<?= h($want['Thread']['id']) ?>">
<!-- 一致するものがあれば、すでに押しているので、「add」のフォームを非表示（hide追加） -->
<?php else : ?>
    <div class="like hide" id="addfavorite<?= h($want['Thread']['id']) ?>">
<?php endif; ?>

        <?= $this->Form->create(' ',[
            'url' => [
                'controller' => 'ThreadLikes',
                'action' => 'add',
            ],
            
            'class' => 'like-form'
        ]); ?>

        <?= $this->Form->hidden('user_id', ['value' => $auth['id']]);?>
        <?= $this->Form->hidden('thread_id', ['value' => $want['Thread']['id']]);?>
        
        <?= $this->Form->button('', ['class' => 'fa fa-thumbs-o-up favorite-add-button clear-decoration']); ?>
        <?= $this->Form->end() ?>
        
        <?php $number_likes_count = count($likes_count);?>
        <!-- <p class="favCount" id="favCount<?= h($want['Thread']['id']) ?>">
        <?php if (! isset($number_likes_count )) : ?>
            0
        <?php else : ?>
        <?= h($number_likes_count );?>
        <?php endif; ?>
        </p> -->
    </div>
    

    <?php if ($searchLike !== false) : ?>
    <div class="like" id="deletefavorite<?= h($want['Thread']['id'])?>">
<!-- 一致するものがなければ、まだ押していないので、「delete」のフォームを非表示（hide追加） -->
<?php else : ?>
    <div class="like hide" id="deletefavorite<?= h($want['Thread']['id']) ?>">
<?php endif; ?>

        <?= $this->Form->create(' ', [
            'url' => [
                'controller' => 'ThreadLikes',
                'action' => 'delete',
            ],
            'class' => 'like-form',
        ]); ?>

            <?= $this->Form->hidden('user_id', ['value' => $auth['id']]);?>
            <?= $this->Form->hidden('thread_id', ['value' => $want['Thread']['id']]);?>
        
        <?= $this->Form->button(' ', [
            'class' => 'fa fa-thumbs-up faa-bounce animated favorite-delete-button clear-decoration'
        , 'aria-hidden' => 'true']); ?>
        <?= $this->Form->end(); ?>

        <!-- <?php $number_likes_count = count($likes_count);?>
        <p class="favCount" id="favCount<?= h($want['Thread']['id']) ?>">
        <?php if (! isset($number_likes_count )) : ?>
            0
        <?php else : ?>
        <?= h($number_likes_count );?>
        <?php endif; ?>
        </p> -->

    </div>
    
    
        <p class="favCount" id="favCount<?= h($want['Thread']['id']) ?>">
        <?php $number_likes_count = count($likes_count);?>
        <?php if (! isset($number_likes_count )) : ?>
            0
        <?php else : ?>
        <?= h($number_likes_count );?>
        <?php endif; ?>
        </p>

        