<?php
    require_once 'app/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_load.css">
    <title>Галерея изображений</title>
</head>
<body>
    <header class="header">
        <div class="div-header-title">   
            <p>Галерея изображений</p>
        </div>
        <div class="div-header-btn-login">   
            <button class="btn-login">Вход</button>
        </div>
    </header>

    <main class="main">
        <section class="show-alert">

        </section>

        <section class="show-picture">
            <?php require_once APP . 'showlist.php'; ?>
        </section>

        <section class="load-picture">
            <?php require_once APP . 'loadpicture.php'; ?>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2026 Галерея изображений</p>
    </footer>

</body>
</html>