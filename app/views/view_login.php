<div class="div-main-login-container">

    <div class="div-alert">
        <?php if($data == 'badlogin'): ?>
            <p>Нет такого пользователя или не верный пароль</p>
        <?php endif; ?>
    </div>

    <form class="form-login" action="/login/signup" method="post">
        <input class="input-login" name="login" type="text" placeholder="логин" required>
        <input class="input-login" name="password" type="password" placeholder="пароль" required>
        <button class="btn-signup" name="submit" type="submit">Войти</button>
    </form>
</div>