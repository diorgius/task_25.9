<div class=div-main-list-container>

    <?php if (!empty($data)): ?>
        
        <?php foreach ($data as $file): ?>
            <div class="div-picture-container">
                <a href="/show/display/<?= $file; ?>" title="Просмотр полного изображения <?= $file; ?>">
                    <img src="<?= URL . 'uploads/' . $file; ?>" class="img-thumb" alt="<?= $file; ?>">
                </a>
                <form action="/delete/deleteFile" method="post">
                    <?php if ($auth): ?>
                        <button type="submit" class="btn-delete" name="file" value="<?= $file; ?>">Удалить</button>
                    <?php endif; ?>   
                </form>
            </div>
        <?php endforeach; ?>

    <?php else: ?>
        <div class="div-alert">
            <p>Нет загруженных изображений</p>
        </div>
    <?php endif; ?>
</div>