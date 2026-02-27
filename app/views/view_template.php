<?php
    require_once CORE .'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_styleload.css">
    <title>Галерея изображений</title>
</head>
<body>
    <header class="header">
        <div class="div-header-title">   
            <p><a class="a-header-title" href="/">Галерея изображений</a></p>
        </div>
        <div class="div-header-btn-login">   
            <button class="btn-login" onclick="location.href='/login'">Вход</button>
        </div>
    </header>

    <main class="main">
        <section class="show-alert">

        </section>

        <section class="section-main">
            <?php require_once VIEW . $view_content; ?>
        </section>

        <section class="load-picture">

        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2026 Галерея изображений</p>
    </footer>

</body>
</html>