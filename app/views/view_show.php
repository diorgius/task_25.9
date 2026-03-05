<?php
    $file = $data['file']; 
    $comments = $data['comments'];
?>

<div class="div-main-show-container">
    <div class="div-show-picture">
        <img src="<?= URL . 'uploads/' . $file; ?>" class="img-full" alt="<?= $file; ?>">
    </div>

    <div class="div-comment-container">
        <p class="comment-title">Комментарии</p>

        <?php if(!empty($comments)): ?>

            <?php for($i = 0; $i < count($comments); $i++): ?>
                <div class="div-show-comment">
                    <span class="comment-header"><?= $comments[$i]['login']; ?></span>
                    <?php 
                        $date = new DateTime($comments[$i]['created'], new DateTimeZone('UTC'));
                        $date->setTimezone(new DateTimeZone('Europe/Moscow'));
                    ?>
                    <span class="comment-header"><?= $date->format('H:i:s d.m.Y'); ?></span>
                    <?php if($comments[$i]['user_id'] == $userId): ?>
                        <button class="btn-delete-comment">Удалить</button>
                    <?php endif;; ?>    
                    <hr class="line-comment">
                    <p class="comment-text"><?= $comments[$i]['comment']; ?></p>                       
                </div>
            <?php endfor; ?>

        <?php else: ?>
            <p class="comment-no">Пока нет ни одного комментария</p>
        <?php endif; ?>

    </div>
    
    <?php if ($auth): ?>
        <div class="div-add-comment">
            <form action="/show/comment/<?= $file; ?>" method="post">
                <label class="comment-title" for="comment">Ваш комментарий</label>
                <textarea class="comment-textarea" id="comment" name="comment" rows="4" required></textarea>
                <button type="submit" class="btn-send">Отправить</button>
            </form>
        </div>
    <?php endif; ?>
</div>