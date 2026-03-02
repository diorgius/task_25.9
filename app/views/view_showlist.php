<div class=div-main-list-container>
    <?php if (!empty($data)): ?>
        <?php foreach ($data as $file): ?>
            <div class="div-picture-container">
                <a href="/show/display/<?= $file; ?>" title="Просмотр полного изображения">
                    <img src="<?= URL . 'uploads' . DIRECTORY_SEPARATOR .$file; ?>" class="img-thumb" alt="<?= $file; ?>">
                </a>
                <form method="post">
                    <?php if ($auth): ?>
                        <button type="submit" class="btn-delete" aria-label="Close" value="<?= $file; ?>">Удалить</button>
                    <?php endif; ?>   
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="div-alert">Нет загруженных изображений</div>
    <?php endif; ?>
</div>