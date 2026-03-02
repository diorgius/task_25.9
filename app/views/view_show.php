<?php
    $file = $data; 
?>

<div class="div-main-show-container">
    <div class="div-show-picture">
        <img src="<?= URL . 'uploads/' . $file; ?>" class="img-full" alt="<?= $file; ?>">
    </div>

    <div class="div-show-comment">
        <p class="comment-title">Комментарии</p>
        <?php if(!empty($comments)): ?>
            <?php foreach ($comments as $key => $comment): ?>
                <p class="comment-text"><?= $comment; ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="comment-no">Пока нет ни одного комментария</p>
        <?php endif; ?>
    </div>

    <div class="div-add-comment">
        <form method="post">
            <label class="comment-title" for="comment">Ваш комментарий</label>
            <textarea class="comment-textarea" id="comment" name="comment" rows="4" required></textarea>
            <button type="submit" class="btn-send">Отправить</button>
        </form>
    </div>
</div>