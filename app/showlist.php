<?php
require_once 'config.php';

$files = scandir(PICTURES);
$files = array_filter($files, function ($file) {
    return !in_array($file, ['.', '..']);
});

?>
    <div class=div-main-list-container>
        <?php if (!empty($files)): ?>
            <?php foreach ($files as $file): ?>
                <div class="div-picture-container">
                    <a href="<?php echo URL . '/file.php?name=' . $file; ?>" title="Просмотр полного изображения">
                        <img src="<?= PICTURES . $file ?>" class="img-thumb" alt="<?php echo $file; ?>">
                    </a>
                    <form method="post">
                        <button type="submit" class="btn-delete" aria-label="Close" value="<?php echo $file; ?>">Удалить</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="div-alert">Нет загруженных изображений</div>
        <?php endif; ?>
    </div>