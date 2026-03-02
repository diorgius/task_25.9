<?php
    $imageFileName = $data; 
?>

<div class="div-main-show-container">
    <div class="div-show-picture">
        <img src="<?= UPLOAD. $imageFileName ?>" class="img-full" alt="<?= $imageFileName ?>">
        <!-- <img src="<?= URL . 'uploads/'. $imageFileName ?>" class="img-full" alt="<?= $imageFileName ?>"> -->
    </div>

    <div class="div-show-comment">
        <?php if(!empty($comments)): ?>
            <?php foreach ($comments as $key => $comment): ?>
                <p class="<?= (($key % 2) > 0) ? 'bg-light' : ''; ?>"><?= $comment; ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">Пока ни одного коммантария, будте первым!</p>
        <?php endif; ?>
    </div>

    <div class="div-add-comment">
        <form method="post">
            <div class="form-group">
                <label for="comment">Ваш комментарий</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <hr>
            <button type="submit" class="btn-send">Отправить</button>
        </form>
    </div>
</div>