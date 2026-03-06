<div class="div-main-upload-container">

    <div class="div-alert">
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $error): ?>
                <p><?= $error; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <form class="form-load-picture" method="post" action="/upload/load" enctype="multipart/form-data">
        <label for="loadfile">Выберите файлы для загрузки</label>
        <input class="input-file" name="files[]" type="file" id="loadfile" multiple required>
        <p>Максимум 20 файлов за один раз.</p>
        <p>Максимальный размер файла: <?= UPLOAD_MAX_SIZE / 1000000; ?> Мб.</p>
        <p>Допустимые форматы: <?= implode(', ', ALLOWED_TYPES) ?>.</p>  
        <button class="btn-load" name="submit" type="submit" >Загрузить</button>
    </form>
</div>