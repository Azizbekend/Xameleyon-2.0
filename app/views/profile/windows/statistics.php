<?php $feedbackFrom = $vars['feedbackFrom'];
$students = $vars['studentsStatistic'];
$teachers = $vars['teachersStatistic'];
$courseList = $vars['courseList'];

function addActive($idRole)
{
    if ($idRole == 2) {
        return "teacher";
    } else if
    ($idRole == 3) {
        return "student";
    }
}


function existsRole()
{
    if (isset($_SESSION['userMore']['idRole'])) {
        if ($_SESSION['userMore']['idRole'] == 5) {
            return "feedback";
        } else {
            return addActive($_SESSION['userMore']['idRole']);
        }
    } else {
        return "feedback";
    }
}
?>


<h3 class="_700">Статистика</h3>

<div class="statistics ">
    <div class="statistics__tabs">
        <form method="post">
            <button name="statistics__feedback"
                class="statistics__tab _fonBack-navy__blue <?= existsRole() == "feedback" ? "_active" : '' ?>">
                <div class="office__tab-img">
                    <img src="<?= htmlentities($publicPath) ?>media/icons/note.svg" alt="user-2">
                </div>
                <p class="statistics__tab-name">Заявок</p>
                <p class="statistics__tab-number"><?= count($feedbackFrom) ?></p>
            </button>
        </form>

        <form method="post">
            <button name="statistics__student"
                class="statistics__tab _fonBack-navy__blue <?= existsRole() == "student" ? "_active" : '' ?>">
                <div class="office__tab-img">
                    <img src="<?= htmlentities($publicPath) ?>media/icons/user-2.svg" alt="user-2">
                </div>
                <p class="statistics__tab-name">Учеников</p>
                <p class="statistics__tab-number"><?= count($students) ?></p>
            </button>
        </form>

        <form method="post">
            <button name="statistics__teacher"
                class="statistics__tab _fonBack-navy__blue <?= existsRole() == "teacher" ? "_active" : '' ?>">

                <div class="office__tab-img">
                    <img src="<?= htmlentities($publicPath) ?>media/icons/briefcase.svg" alt="user-2">
                </div>
                <p class="statistics__tab-name">Учителей</p>
                <p class="statistics__tab-number"><?= count($teachers) ?></p>
            </button>
        </form>
    </div>

    <div class="statistics__tablet _windows__cards <?= existsRole() == "feedback" ? "_active" : '' ?>">
        <?php
        if (!empty($feedbackFrom)) {
            foreach ($feedbackFrom as $feedback) { ?>
                <div class="statistics__applications-card _fonBack-navy__blue">
                    <p class="statistics__applications-card__name _text-lvl_1 _700">
                        <?= htmlentities($feedback['name']) ?>
                    </p>
                    <a href="tel:<?= htmlentities($feedback['telNumber']) ?>"
                        class="statistics__applications-card__tel _text-lvl_2 _700"><?= htmlentities($feedback['telNumber']) ?></a>
                    <form method="post">
                        <input type="hidden" name="idFeedback" value="<?= htmlentities($feedback['id']) ?>">
                        <button class="statistics__applications-card__btn" name="deletFeedback">
                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 1.76514L19.8834 19.2346" stroke="white" stroke-width="3" stroke-linecap="round" />
                                <path d="M2 19.2349L19.8834 1.76537" stroke="white" stroke-width="3" stroke-linecap="round" />
                            </svg>
                        </button>
                    </form>
                </div>
            <?php }
        } ?>
    </div>

    <div class="statistics__tablet _windows__cards <?= existsRole() == "student" ? "_active" : '' ?>">
        <?php
        if (!empty($students)) {
            foreach ($students as $student) { ?>
                <div class="statistics__students-card _fonBack-navy__blue _accordionCard">
                    <div class="statistics__students-card__top">
                        <a href="userInfoForAdmin?idUser=<?= htmlentities($student['student']['id']) ?>"
                            class="statistics__students-card__name _text-lvl_1 _700"><?= htmlentities($student['student']['name']) ?></a>
                        <a class="statistics__students-card__tel _text-lvl_2 _700"
                            href="<?= htmlentities($student['student']['telegaLink']) ?>"><?= htmlentities($student['student']['telegaLink']) ?></a>
                        <div class="statistics__students-card__btns">

                            <!-- Кнопки для бана -->
                            <?php if ($student['student']['ban'] == 0) { ?>
                                <form method="post">
                                    <input type="hidden" name="idUser" value="<?= htmlentities($student['student']['id']) ?>">
                                    <button class="statistics__students-card__remove _text-lvl_3" name="ban">Забанить</button>
                                </form>
                            <?php } else { ?>
                                <form method="post">
                                    <input type="hidden" name="idUser" value="<?= htmlentities($student['student']['id']) ?>">
                                    <button class="statistics__students-card__remove _text-lvl_3" name="razBan">Разбанить</button>
                                </form>
                            <?php } ?>
                            <?php if (!empty($student['coursList'])) { ?>
                                <button class="statistics__students-card__down _accordionDown">
                                    <svg width="32" height="17" viewBox="0 0 32 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M30 15.3135L16.0497 1.68604" stroke="white" stroke-width="3"
                                            stroke-linecap="round" />
                                        <path d="M16.0498 1.68604L2.09947 15.3135" stroke="white" stroke-width="3"
                                            stroke-linecap="round" />
                                    </svg>
                                </button>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="statistics__students-card__bottom _accordionBottom">
                        <?php foreach ($student['coursList'] as $cours) { ?>
                            <p class="statistics__teacher-card__cours"><?= htmlentities($cours) ?></p>
                        <?php } ?>
                    </div>
                </div>
            <?php }
        } ?>
    </div>

    <div class="statistics__tablet _windows__cards <?= existsRole() == "teacher" ? "_active" : '' ?>">
        <?php if (!empty($teachers)) {
            foreach ($teachers as $teacher) { ?>
                <div class="statistics__teacher-card _fonBack-navy__blue _accordionCard">
                    <div class="statistics__teacher-card__top">
                        <a href="userInfoForAdmin?idUser=<?= htmlentities($teacher['teachers']['id']) ?>"
                            class="statistics__teacher-card__name _text-lvl_1 _700"><?= htmlentities($teacher['teachers']["surname"]) . " " . htmlentities($teacher['teachers']["name"]) ?></a>
                        <a class="statistics__teacher-card__tel _text-lvl_2 _700"
                            href="https://t.me/AZIZ_006"><?= htmlentities($teacher['teachers']["telegaLink"]) ?></a>
                        <div class="statistics__teacher-card__btns">
                            <button class="statistics__teacher-card__down _accordionDown">
                                <svg width="32" height="17" viewBox="0 0 32 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30 15.3135L16.0497 1.68604" stroke="white" stroke-width="3"
                                        stroke-linecap="round" />
                                    <path d="M16.0498 1.68604L2.09947 15.3135" stroke="white" stroke-width="3"
                                        stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="statistics__teacher-card__bottom _accordionBottom">
                        <?php foreach ($teacher['coursList'] as $cours) { ?>
                            <form class="statistics__teacher-card__cours" method="post">
                                <input type="hidden" name="idTech" value="<?= htmlentities($teacher['teachers']['id']) ?>">
                                <input type="hidden" name="idCours" value="<?= htmlentities($cours['id']) ?>">

                                <p><?= htmlentities($cours['name']) ?></p>
                                <button name="removeCourseTech">
                                    <img src="<?= htmlentities($publicPath) ?>media/icons/X.svg" alt="addClick">
                                </button>
                            </form>
                        <?php } ?>

                        <form class="statistics__teacher-card__cours" method="post">
                            <input type="hidden" name="idTech" value="<?= htmlentities($teacher['teachers']['id']) ?>">
                            <select name="idCours">
                                <?php foreach ($courseList as $course) { ?>
                                    <option value="<?= $course['id'] ?>"><?= $course["name"] ?></option>
                                <?php } ?>
                            </select>
                            <button name="addCoursTeacher">
                                <img src="<?= htmlentities($publicPath) ?>media/icons/addClick.svg" alt="addClick">
                            </button>
                        </form>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
</div>