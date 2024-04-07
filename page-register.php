<section class="login _content">
    <h2>Авторизация</h2>
    <form class="_fonBack-navy__blue" method="post">
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="surname" placeholder="Фамилия">
        <input type="text" name="middleName" placeholder="Отчество*">
        <input type="text" name="link" placeholder="Ссылка на телеграмм">
        <input type="tel" name="tel" placeholder="Номер телефона">
        <input type="text" name="email" placeholder="Почта">
        <input type="password" name="password" placeholder="Пароль">
        <input type="password" name="replayPassword" placeholder="Повторите пароль">

        <input class="login__btn _btn" type="submit" name="register" value="Зарегистрироваться">
    </form>
    <p class="login__link _text-lvl_2">Если уже есть аккаунт то <a href="?page=login">авторизуйтесь</a></p>
</section>

<?php
    if(isset($_POST["register"])){
        echo "<script>document.location.href='?page=office'</script>";
    }
?>