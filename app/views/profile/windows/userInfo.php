<h3 class="_700">Личная информация</h3>

<!-- Невидимая форма для удаления фотографии -->
<!-- Срабатывает при нажатии на кнопку удалить фото -->
<form method="post" name="deleteUserFotoForm">
    <input type="hidden" name="deleteUserFoto">
</form>

<form class="userInfo" method="post" enctype="multipart/form-data">
    <div class="userInfo__cards _windows__cards">
        <div class="userInfo__card">
            <p class="userInfo__name">Фотография</p>
            <input type="file" name="userFoto" id="userFoto" style="display: none;">

            <div class="userInfo__fotos">
                <label class="userInfo__fotoBtn _btn _border " for="userFoto">Изменить фотографию</label>
                <?php if (!empty($user["img"])) { ?>
                    <div class="userInfo__fotoBtn _btn _border _redBack" id="deleteUserFoto">Удалить фотографию</div>
                <?php } ?>
            </div>

        </div>
        <?php // Вывод ошибок
        if (isset($_SESSION['errors']['imgUser'])) { ?>
            <p style="color: red"><?= htmlentities($_SESSION['errors']['imgUser']); ?></p>
            <?php unset($_SESSION['errors']['imgUser']);
        } ?>


        <div class="userInfo__card">
            <p class="userInfo__name">Фамилия</p>
            <input class="userInfo__inp _fonBack-navy__blue" name="surname" type="text" placeholder="Фамилия"
                value="<?= htmlentities($user["surname"]) ?>">
            <?php // Вывод ошибок
            if (isset($_SESSION['errors']['surname'])) { ?>
                <p style="color: red"><?= htmlentities($_SESSION['errors']['surname']); ?></p>
                <?php unset($_SESSION['errors']['surname']);
            } ?>
        </div>
        <div class="userInfo__card">
            <p class="userInfo__name">Имя</p>
            <input class="userInfo__inp _fonBack-navy__blue" name="name" type="text" placeholder="Имя"
                value="<?= htmlentities($user["name"]) ?>">
            <?php // Вывод ошибок
            if (isset($_SESSION['errors']['name'])) { ?>
                <p style="color: red"><?= htmlentities($_SESSION['errors']['name']); ?></p>
                <?php unset($_SESSION['errors']['name']);
            } ?>
        </div>
        <div class="userInfo__card">
            <p class="userInfo__name">Отчество</p>
            <input class="userInfo__inp _fonBack-navy__blue" name="middleName" type="text" placeholder="Отчество"
                value="<?= htmlentities($user["middleName"]) ?>">
        </div>
        <div class="userInfo__card">
            <p class="userInfo__name">Дата рождения</p>
            <div class="userInfo__inp _fonBack-navy__blue _date">
                <input name="birthday" type="date" placeholder="00.00.0000" value="<?php
                if ($user["birthday"] != "0000-00-00") {
                    echo htmlentities($user["birthday"]);
                } ?>">
            </div>
        </div>
        <div class="userInfo__card">
            <p class="userInfo__name">Ссылка на телеграмм</p>
            <input class="userInfo__inp _fonBack-navy__blue" name="telegaLink" type="text" placeholder="@link"
                value="<?= htmlentities($user["telegaLink"]) ?>">
            <?php // Вывод ошибок
            if (isset($_SESSION['errors']['link'])) { ?>
                <p style="color: red"><?= htmlentities($_SESSION['errors']['link']); ?></p>
                <?php unset($_SESSION['errors']['link']);
            } ?>
        </div>
        <div class="userInfo__card">
            <p class="userInfo__name">Номер телефона</p>

            <input class="userInfo__inp _fonBack-navy__blue" data-tel-input name="telNumber" type="tel"
                placeholder="Номер" value="<?= htmlentities($user["telNumber"]) ?>">
            <?php // Вывод ошибок
            if (isset($_SESSION['errors']['tel'])) { ?>
                <p style="color: red"><?= htmlentities($_SESSION['errors']['tel']); ?></p>
                <?php unset($_SESSION['errors']['tel']);
            } ?>
        </div>
        <div class="userInfo__card">
            <p class="userInfo__name">Почта</p>
            <input class="userInfo__inp _fonBack-navy__blue" name="email" type="email" placeholder="Почта"
                value="<?= $user["email"] ?>">
            <?php // Вывод ошибок
            if (isset($_SESSION['errors']['email'])) { ?>
                <p style="color: red"><?= htmlentities($_SESSION['errors']['email']); ?></p>
                <?php unset($_SESSION['errors']['email']);
            } ?>
        </div>
        <div class="userInfo__card">
            <p class="userInfo__name">Измениить пароль</p>
            <input class="userInfo__inp _fonBack-navy__blue" name="password" type="password"
                placeholder="Старый пароль">
            <?php // Вывод ошибок
            if (isset($_SESSION['errors']['password'])) { ?>
                <p style="color: red"><?= htmlentities($_SESSION['errors']['password']); ?></p>
                <?php unset($_SESSION['errors']['password']);
            } ?>
        </div>
        <div class="userInfo__card">
            <p class="userInfo__name">Новый пароль</p>
            <input class="userInfo__inp _fonBack-navy__blue" name="password_r" type="password"
                placeholder="Новый пароль">
            <?php // Вывод ошибок
            if (isset($_SESSION['errors']['password_r'])) { ?>
                <p style="color: red"><?= htmlentities($_SESSION['errors']['password_r']); ?></p>
                <?php unset($_SESSION['errors']['password_r']);
            } ?>
        </div>

        <div class="userInfo__btns">
            <input class="userInfo__btn _btn _border" type="submit" name="update" value="Сохранить изменения">
            <?php if ($user["idRole"] === 3) { ?>
                <input class="userInfo__btn _btn _border _redBack" type="submit" name="delete" value="Удалить аккаунт">
            <?php } ?>
        </div>
    </div>
</form>