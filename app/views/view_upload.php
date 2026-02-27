<form class="form-load-picture" method="post" enctype="multipart/form-data">
    <label for="loadfile">Выберите файлы для загрузки</label>
    <input type="file" class="input-file" name="files[]" id="loadfile" multiple required>
    <p>Максимальный размер файла: <?php echo UPLOAD_MAX_SIZE / 1000000; ?>Мб.</p>
    <p>Допустимые форматы: <?php echo implode(', ', ALLOWED_TYPES) ?>.</p>  
    <button type="submit" class="btn-load">Загрузить</button>
</form>