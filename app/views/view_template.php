<?php
    session_start();
    $auth = $_SESSION['auth'] ?? null;
    $userId = $_SESSION['userId'] ?? null;
    $login = $_SESSION['login'] ?? null;
    require_once CORE .'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style_styleload.css">
    <title>Галерея изображений</title>
</head>
<body>
    <header class="header">
        <div class="div-header-title">   
            <p><a class="a-header-title" href="/">Галерея изображений</a></p>
        </div>
        <div class="div-header-btn-login">
            <?php if (!$auth): ?>
                <button class="btn-login" onclick="location.href='/login'">Вход</button>
                <button class="btn-login" onclick="location.href='/registration'">Регистрация</button>
            <?php else: ?>
                <button class="btn-login" onclick="location.href='/login/signout'">Выход</button>
            <?php endif; ?>   
        </div>
    </header>

    <main class="main">

        <section class="section-load-picture">
            <?php if ($auth): ?>
                <button class="btn-upload" onclick="location.href='/upload'">Загрузить изображения</button>
            <?php endif; ?>   
        </section>

        <section class="section-main">
            <?php require_once VIEW . $view_content; ?>
        </section>

    </main>

    <footer class="footer">
        <p>&copy; 2026 Галерея изображений</p>
    </footer>

</body>
</html>