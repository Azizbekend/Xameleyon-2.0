<?php $publicPath = '../public/'; ?>

<section class="login _content">
    <h2>Регистрация</h2>
    <form class="_fonBack-navy__blue" method="post">

        <input type="text" name="surname" placeholder="Фамилия*" value="<?php if (isset($_SESSION['surname'])) {
            echo htmlentities($_SESSION['surname']);
            unset($_SESSION['surname']);
        } ?>">
        <?php if (isset($_SESSION['errors']['surname'])) { ?>
            <p style="color: red"><?= htmlentities($_SESSION['errors']['surname']); ?></p>
            <?php unset($_SESSION['errors']['surname']);
        } ?>

        <input type="text" name="name" placeholder="Имя*" value="<?php if (isset($_SESSION['name'])) {
            echo htmlentities($_SESSION['name']);
            unset($_SESSION['name']);
        } ?>">
        <?php if (isset($_SESSION['errors']['name'])) { ?>
            <p style="color: red"><?= htmlentities($_SESSION['errors']['name']); ?></p>
            <?php unset($_SESSION['errors']['name']);
        } ?>

        <input type="text" name="middleName" placeholder="Отчество" value="<?php if (isset($_SESSION['middleName'])) {
            echo htmlentities($_SESSION['middleName']);
            unset($_SESSION['middleName']);
        } ?>">
        <?php if (isset($_SESSION['errors']['middleName'])) { ?>
            <p style="color: red"><?= htmlentities($_SESSION['errors']['middleName']); ?></p>
            <?php unset($_SESSION['errors']['middleName']);
        } ?>

        <input type="text" name="link" placeholder="Ссылка на телеграмм" value="<?php if (isset($_SESSION['link'])) {
            echo htmlentities($_SESSION['link']);
            unset($_SESSION['link']);
        } ?>">
        <?php if (isset($_SESSION['errors']['link'])) { ?>
            <p style="color: red"><?= htmlentities($_SESSION['errors']['link']); ?></p>
            <?php unset($_SESSION['errors']['link']);
        } ?>

        <input type="tel" name="tel" data-tel-input placeholder="Номер телефона*" value="<?php if (isset($_SESSION['tel'])) {
            echo htmlentities($_SESSION['tel']);
            unset($_SESSION['tel']);
        } ?>">
        <?php if (isset($_SESSION['errors']['tel'])) { ?>
            <p style="color: red"><?= htmlentities($_SESSION['errors']['tel']); ?></p>
            <?php unset($_SESSION['errors']['tel']);
        } ?>

        <input type="text" name="email" placeholder="Почта*" value="<?php if (isset($_SESSION['email'])) {
            echo htmlentities($_SESSION['email']);
            unset($_SESSION['email']);
        } ?>">
        <?php if (isset($_SESSION['errors']['email'])) { ?>
            <p style="color: red"><?= htmlentities($_SESSION['errors']['email']); ?></p>
            <?php unset($_SESSION['errors']['email']);
        } ?>

        <input type="password" name="password" placeholder="Пароль*">
        <?php if (isset($_SESSION['errors']['password'])) { ?>
            <p style="color: red"><?= htmlentities($_SESSION['errors']['password']); ?></p>
            <?php unset($_SESSION['errors']['password']);
        } ?>

        <input type="password" name="password_r" placeholder="Повторите пароль*">
        <?php if (isset($_SESSION['errors']['password_r'])) { ?>
            <p style="color: red"><?= htmlentities($_SESSION['errors']['password_r']); ?></p>
            <?php unset($_SESSION['errors']['password_r']);
        } ?>

        <input class="login__btn _btn" type="submit" name="register" value="Зарегистрироваться">
    </form>
    <p class="login__link _text-lvl_2">Если уже есть аккаунт то <a href="login">авторизуйтесь</a></p>
</section>

<?php
// if(isset($_POST["register"])){
//     header('Location: ../profile/infoUser');
// }
?>