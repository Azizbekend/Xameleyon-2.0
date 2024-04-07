<section class="login _content">
    <h2>Авторизация</h2>
    <form class="_fonBack-navy__blue" method="post">
        <input type="email" name="email" placeholder="Введите почту" id="emailLogin">
        <input type="password" name="password" placeholder="Введите пароль">
        <div class="login__btns">
            <div class="login__btn _btn _tel _active">по телефону</div>
            <div class="login__btn _btn _email ">по почту</div>
        </div>
        <input class="login__btn _btn" type="submit" name="login" value="Войти">
    </form>
    <p class="login__link _text-lvl_2">Если нету аккаунта то <a href="?page=register">зарегистрируйтесь</a></p>
</section>

<?php
    if(isset($_POST["login"])){
        echo "<script>document.location.href='?page=office'</script>";
    }
?>