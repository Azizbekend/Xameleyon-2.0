<?php
if (!empty($_SESSION['userMore'])) {
    $userMore = $_SESSION['userMore'];
    $course = $vars;
    // Заголовок
    if ($userMore['idRole'] == 2) {
        $nameRole = "Учитель";
    } else if ($userMore["idRole"] == 3) {
        $nameRole = "Ученик";
    }
    // Вывод фото
    if (!empty($userMore['img'])) {
        $userFoto = $userMore['img'];
    } else {
        $userFoto = 'defult.jpg';
    }
    // Изменение даты в правильный вид
    function formatDate($date)
    {
        $timestamp = strtotime($date);
        $formatted_date = date('d.m.Y', $timestamp);
        return $formatted_date;
    }
    ?>
    <h3><?= htmlentities($nameRole) ?></h3>

    <div class="userInfo">
        <div class="userInfo__cards _windows__cards">
            <div class="userInfo__card">
                <img class="userInfo__new" src="<?= $publicPath ?>media/users/<?= htmlentities($userFoto) ?>" alt="user">
            </div>
            <div class="userInfo__card">
                <p class="userInfo__name">Фамилия</p>
                <p class="userInfo__inp _fonBack-navy__blue"><?= htmlentities($userMore["surname"]) ?></p>
            </div>
            <div class="userInfo__card">
                <p class="userInfo__name">Имя</p>
                <p class="userInfo__inp _fonBack-navy__blue"><?= htmlentities($userMore["name"]) ?></p>
            </div>
            <div class="userInfo__card">
                <p class="userInfo__name">Отчество</p>
                <p class="userInfo__inp _fonBack-navy__blue"><?= htmlentities($userMore["middleName"]) ?></p>
            </div>
            <div class="userInfo__card">
                <p class="userInfo__name">Дата рождения</p>
                <p class="userInfo__inp _fonBack-navy__blue">
                    <?php
                    if ($userMore["birthday"] != "0000-00-00" && isset($userMore["birthday"])) {
                        echo htmlentities(formatDate($userMore["birthday"]));
                    } ?>
                </p>
            </div>
            <div class="userInfo__card">
                <p class="userInfo__name">Ссылка на телеграмм</p>
                <p class="userInfo__inp _fonBack-navy__blue"><?= htmlentities($userMore["telegaLink"]) ?></p>
            </div>
            <div class="userInfo__card">
                <p class="userInfo__name">Номер телефона</p>
                <p class="userInfo__inp _fonBack-navy__blue"><?= htmlentities($userMore["telNumber"]) ?></p>
            </div>
            <div class="userInfo__card">
                <p class="userInfo__name">Почта</p>
                <p class="userInfo__inp _fonBack-navy__blue"><?= htmlentities($userMore["email"]) ?></p>
            </div>
        </div>
    </div>

    <?php if (!empty($course)) { ?>
        <h3 class="userInfo__title">Курсы</h3>
        <div class="admin-cours__cards _userInfo">
            <?php foreach ($course as $cours) { ?>
                <div class="admin-cours__card _cours-card">
                    <img src="<?= $publicPath ?>media/cours-cards/<?= htmlentities($cours['img']) ?>" alt="cours">
                    <h5><?= $cours['name'] ?></h5>
                    <p class="_text-lvl_2"><?= $cours['miniDiscription'] ?></p>

                    <div class="admin-cours__btns">
                        <form method="post" action="addcours">
                            <input type="hidden" name="id_cours" value="<?= htmlentities($cours['id']) ?>">
                            <button class="admin-cours__btn _btn" name="updateCoursePage">Подробнее</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

<?php } else { ?>
    <h2>Пользователь не найден</h2>
<?php } ?>

<div class="userInfo__btns _infoUser">
    <a class="userInfo__btn _btn _notBack" href="statistics">Назад</a>
</div>