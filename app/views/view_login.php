<div class="div-main-login-container">

    <div class="div-alert">
        <?php if($data == 'badlogin'): ?>
            <p>нет такого пользователя</p>
        <?php endif; ?>
    </div>

    <form class="form-login" id="formlogin" action="/login/singup" method="post">
        <input class="input-login" name="login" type="text" placeholder="логин" required>
        <input class="input-login" name="password" type="password" placeholder="пароль" required>
        <button class="btn-signup" value="login" id="loginButton" name="submit" type="submit">Войти</button>
        <!-- <button class="btn-signup" value="registration" id="regButton" name="submit" type="submit">Зарегистрироваться</button> -->
    </form>
</div>