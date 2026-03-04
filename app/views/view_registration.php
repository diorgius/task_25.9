<div class="div-main-login-container">

    <div class="div-alert">
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $error): ?>
                <p><?= $error; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <form class="form-login" id="formlogin" action="/registration/signup" method="post">
        <input class="input-login" name="login" type="text" placeholder="логин" required>
        <input class="input-login" name="email" type="email" placeholder="email" value="example@example.com" required>
        <input class="input-login" name="password" type="password" placeholder="пароль" required>
        <input class="input-login" name="passwordagain" type="password" placeholder="пароль еще раз" required>
        <button class="btn-signup" value="registration" id="regButton" name="submit" type="submit">Зарегистрироваться</button>
    </form>
</div>