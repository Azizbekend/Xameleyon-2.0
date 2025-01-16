<?php $publicPath = '../public/'; ?>

<section class="login _content">
    <h2>Авторизация</h2>
    <form class="_fonBack-navy__blue" method="post">

        <input type="email" name="email" placeholder="Введите почту*" id="emailLogin" value="
        <?php
        // Вывод прежнего значения в поле
        if (isset($_SESSION['email'])) {
            echo htmlentities($_SESSION['email']);
            unset($_SESSION['email']);
        }
        ?> 
    ">

        <?php // Вывод ошибок
        if (isset($_SESSION['errors']['email'])) { ?>
            <p style="color: red"><?= htmlentities($_SESSION['errors']['email']) ?></p>
            <?php unset($_SESSION['errors']['email']);
        } ?>

        <input type="password" name="password" placeholder="Введите пароль*">

        <?php // Вывод ошибок
        if (isset($_SESSION['errors']['password'])) { ?>
            <p style="color: red"><?= htmlentities($_SESSION['errors']['password']) ?></p>
            <?php unset($_SESSION['errors']['password']);
        } ?>


        <input class="login__btn _btn" type="submit" name="login" value="Войти">
    </form>
    <p class="login__link _text-lvl_2">Если нету аккаунта то <a href="register">зарегистрируйтесь</a></p>
</section>