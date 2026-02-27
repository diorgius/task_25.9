<div class="div-main-login-container">
    <form class="form-login" id="formlogin" action="authentication.php" method="post">
        <label for="id">Электронная почта</label>
        <input class="input-login" name="login" id="login" type="email" placeholder="email@example.com" required>
        <input class="input-login" name="password" type="password" placeholder="пароль" required>
        <div class="div-wrap-input" id="divwrap"></div>
        <button class="button-login" value="login" id="loginButton" name="submit" type="submit">Войти</button>
        <button class="button-login" value="registration" id="regButton" name="submit" type="submit">Зарегистрироваться</button>
    </form>
</div>