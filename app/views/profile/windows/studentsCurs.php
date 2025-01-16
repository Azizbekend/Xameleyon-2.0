<?php
$coursList = $vars;
?>

<h3 class="_700">Ваши <span>курсы</span></h3>

<div class="studentscours">
    <div class="studentscours-cards _windows__cards">

        <?php
        if (empty($coursList)) { ?>
            <h2>У вас ещё нету курсов</h2>
        <?php } else {
            foreach ($coursList as $course) { ?>
                <form class="studentscours-card _fonBack-navy__blue _hover" method="post" action="../../lesson/lesson">
                    <input type="hidden" name="idCourse" value="<?= htmlentities($course['idCourse']) ?>">
                    <button class="studentscours-card__name _text-lvl_1 _700"
                        name="lessonsPage"><?= htmlentities($course['nameCourse']) ?></button>

                    <div class="studentscours-card__progress-spans">
                        <span class="_active"></span>
                        <span class="_active"></span>
                        <span class="_active"></span>
                        <span></span>
                        <span></span>
                    </div>

                    <p class="studentscours-card__count _text-lvl_1 _700">
                        <?= htmlentities($course['gradeCountGood']) ?>/<?= htmlentities($course['gradeCountAll']) ?>
                    </p>

                </form>
            <?php }
        } ?>
    </div>
</div>