    <?= $data; ?>
    <div class="div-main-show-container">
        <!-- <div class="col-12 col-sm-8 offset-sm-2"> -->

            <img src="<?php echo URL . '/' . UPLOAD_DIR . '/' . $imageFileName ?>" class="img-thumbnail mb-4"
                 alt="<?php echo $imageFileName ?>">

            <!-- <h3>Комментарии</h3>
            <?php if(!empty($comments)): ?>
                <?php foreach ($comments as $key => $comment): ?>
                    <p class="<?php echo (($key % 2) > 0) ? 'bg-light' : ''; ?>"><?php echo $comment; ?></p>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted">Пока ни одного коммантария, будте первым!</p>
            <?php endif; ?>

            <!-- Форма добавления комментария -->
            <!-- <form method="post">
                <div class="form-group">
                    <label for="comment">Ваш комментарий</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form> --> -->
        <!-- </div> -->
    </div><!-- /.row -->

</div><!-- /.container -->