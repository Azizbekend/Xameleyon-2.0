<?php

$courses = [];

if (isset($vars['listIdCourse'])) {
    $courses = $vars['courses'];
    $listCourse = $vars['listIdCourse'];

} else {
    $courses = $vars;
}


?>

<h3 class="_700">Курсы</h3>

<!-- cours -->
<div class="admin-cours__cards">

    <?php if ($user["idRole"] === 1) {
        foreach ($courses as $cours) { ?>
            <div class="admin-cours__card _cours-card">
                <img src="<?= htmlentities($publicPath) ?>media/cours-cards/<?= htmlentities($cours['img']) ?>" alt="cours">
                <h5><?= htmlentities($cours['name']) ?></h5>
                <p class="_text-lvl_2"><?= htmlentities($cours['miniDiscription']) ?></p>

                <div class="admin-cours__btns">
                    <form class="admin-cours__form" method="post" action="addcours">
                        <input type="hidden" name="id_cours" value="<?= htmlentities($cours['id']) ?>">
                        <button class="admin-cours__btn _btn" name="updateCoursePage">Редактировать</button>
                    </form>
                    <form class="admin-cours__form" method="post">
                        <input type="hidden" name="id_cours" value="<?= htmlentities($cours['id']) ?>">
                        <input class="admin-cours__btn _btn _redBack" type="submit" name="delete" value="Удалить">
                    </form>
                </div>

                <form class="admin-cours__form" method="post">
                    <input type="hidden" name="id_cours" value="<?= htmlentities($cours['id']) ?>">
                    <?php
                    if ($cours['releaseCourse'] == 0) { ?>
                        <input class="admin-cours__btn _btn _notBack _unbounded" type="submit" name="openCourse" value="Открыть">
                    <?php } else { ?>
                        <input class="admin-cours__btn _btn  _unbounded" type="submit" name="closeCourse" value="Закрыть">
                    <?php } ?>
                </form>
            </div>
        <?php } ?>
    <?php } else if ($user["idRole"] === 2) {
        foreach ($courses as $cours) { ?>
                <div class="admin-cours__card _cours-card">
                    <img src="<?= htmlentities($publicPath) ?>media/cours-cards/<?= htmlentities($cours['img']) ?>" alt="cours">
                    <h5><?= htmlentities($cours['name']) ?></h5>
                    <p class="_text-lvl_2"><?= htmlentities($cours['miniDiscription']) ?></p>

                    <div class="admin-cours__btns">
                        <form class="admin-cours__form" method="post" action="../../lesson/lesson">
                            <input type="hidden" name="idCourse" value="<?= htmlentities($cours['id']) ?>">
                            <button class="admin-cours__btn _btn" name="lessonsPage">Программа</button>
                        </form>
                    </div>
                </div>
        <?php }
    } else if ($user['idRole'] === 3) {
        foreach ($courses as $cours) { ?>
                    <div class="admin-cours__card _cours-card">
                        <img src="<?= htmlentities($publicPath) ?>media/cours-cards/<?= htmlentities($cours['img']) ?>" alt="cours">
                        <h5><?= htmlentities($cours['name']) ?></h5>
                        <p class="_text-lvl_2"><?= htmlentities($cours['miniDiscription']) ?></p>

                <?php if (in_array($cours['id'], $listCourse)) { ?>
                            <div class="admin-cours__btns">
                                <a href="coursesMy" class="admin-cours__btn _btn _notBack">Куплен</a>
                            </div>
                <?php } else {
                    if ($cours['releaseCourse'] == 1) { ?>
                                <div class="admin-cours__btns">
                                    <form class="admin-cours__form" method="post" action="infoCourse">
                                        <input type="hidden" name="id" value="<?= htmlentities($cours['id']) ?>">
                                        <button class="admin-cours__btn _btn" name="oneCourse">Подробнее</button>
                                    </form>
                                </div>
                    <?php } else { ?>
                                <div class="admin-cours__btns">
                                    <h5>СКОРО</h5>
                                </div>
                    <?php }
                } ?>
                    </div>
        <?php }
    }
    ?>

</div>