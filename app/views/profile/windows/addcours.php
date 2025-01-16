<?php
if (!empty($vars['course'])) {
    $course = $vars['course'];
    $salaryes = $vars['salaryes'];

    foreach ($salaryes as $salary) {
        if ($salary['name'] == "Junior") {
            $idSalaryJun = $salary['id'];
            $salaryJun = $salary['salary'];
        }
        if ($salary['name'] == "Middle") {
            $idSalaryMid = $salary['id'];
            $salaryMid = $salary['salary'];
        }
        if ($salary['name'] == "Senior") {
            $idSalarySen = $salary['id'];
            $salarySen = $salary['salary'];
        }
    }
}

function getInp($sName)
{
    $result = true;
    if (isset($_SESSION['infoCourse'][$sName])) {
        echo htmlentities($_SESSION['infoCourse'][$sName]);
        unset($_SESSION['infoCourse'][$sName]);
        $result = false;
    }

    return $result;
}
function getErrors($sName)
{
    if (isset($_SESSION['errors'][$sName])) {
        echo "<p style='color: red;'>" . htmlentities($_SESSION['errors'][$sName]) . "</p>";
        unset($_SESSION['errors'][$sName]);
    }
}
?>

<div class="addcours">
    <form method="post" enctype="multipart/form-data">
        <h3 class="_700">Карточка <span>курса</span></h3>

        <div class="addcours-cards">
            <div class="addcours-card__face _fonBack-navy__blue">
                <div class="addcours-card__img">
                    <input type="file" id="cours__foto" name="imgCourse" style="display: none;">
                    <?php if (isset($course['img'])) { ?>
                        <label for="cours__foto"><img
                                src="<?= htmlentities($publicPath) ?>media/cours-cards/<?= htmlentities($course['img']) ?>"
                                alt="cours"></label>
                    <?php } else { ?>
                        <label for="cours__foto">350<span>x</span>350</label>
                    <?php } ?>

                    <?php if (isset($_SESSION['errors']['img'])) {
                        echo "<p style='color: red;'>";
                        echo htmlentities($_SESSION['errors']['img']);
                        echo "</p>";

                        unset($_SESSION["errors"]["img"]);
                    }
                    ?>
                </div>

                <div class="addcours-card__face-inps">
                    <!-- имя -->
                    <input class="addcours-card__face-inp" name="cours-name" placeholder="Название" value="<?php
                    if (getInp('cours-name')) {
                        if (isset($course['name'])) {
                            echo htmlentities($course['name']);
                        }
                    } ?>">
                    <?php getErrors('name'); ?>

                    <!-- цена -->
                    <input class="addcours-card__face-inp" name="cours-price" placeholder="Цена" value="<?php
                    if (getInp('cours-price')) {
                        if (isset($course['name'])) {
                            echo htmlentities($course['price']);
                        }
                    } ?>">
                    <?php getErrors('price'); ?>

                    <!-- название специалиста -->
                    <input class="addcours-card__face-inp" name="cours-specialist" placeholder="Название специалиста"
                        value="<?php
                        if (getInp('cours-specialist')) {
                            if (isset($course['name'])) {
                                echo htmlentities($course['specialist']);
                            }
                        } ?>">
                    <?php getErrors('specialist'); ?>

                    <textarea class="addcours-card__face-inp" name="cours-discriptionMini"
                        placeholder="Описание карточки"><?php
                        if (getInp('cours-discriptionMini')) {
                            if (isset($course['name'])) {
                                echo htmlentities($course['miniDiscription']);
                            }
                        } ?></textarea>
                    <?php getErrors('discriptionMini'); ?>
                </div>
            </div>

            <div class="addcours-card _fonBack-navy__blue">
                <textarea class="addcours-card__slogan" name="cours-slogan" placeholder="Слоган"><?php
                if (getInp('cours-slogan')) {
                    if (isset($course['name'])) {
                        echo htmlentities($course['slogan']);
                    }
                } ?></textarea>
                <?php getErrors('slogan'); ?>
            </div>

            <div class="addcours-card _fonBack-navy__blue">
                <textarea class="addcours-card__discription" name="cours-discription"
                    placeholder="Описание обязанностей специалиста"><?php
                    if (getInp('cours-discription')) {
                        if (isset($course['name'])) {
                            echo htmlentities($course['discription']);
                        }
                    } ?></textarea>
                <?php getErrors('discription'); ?>
            </div>
        </div>

        <h3 class="_700"><span>Доход</span> специалистов</h3>

        <div class="addcours-cards">
            <div class="addcours-card__income _fonBack-navy__blue">
                <p class="addcours-card__income-name">Junior -</p>
                <input type="hidden" name="idJunior" value="<?= htmlentities($idSalaryJun) ?>">
                <input class="addcours-card__income-inp" name="income-junior" placeholder="доход" value="<?php
                if (getInp('income-junior')) {
                    if (isset($course['name'])) {
                        echo htmlentities($salaryJun);
                    }
                } ?>">
            </div>
            <?php getErrors('income-junior'); ?>

            <div class="addcours-card__income _fonBack-navy__blue">
                <p class="addcours-card__income-name">Middle -</p>
                <input type="hidden" name="idMiddle" value="<?= htmlentities($idSalaryMid) ?>">
                <input class="addcours-card__income-inp" name="income-middle" placeholder="доход" value="<?php
                if (getInp('income-middle')) {
                    if (isset($course['name'])) {
                        echo htmlentities($salaryMid);
                    }
                } ?>">
            </div>
            <?php getErrors('income-middle'); ?>

            <div class="addcours-card__income _fonBack-navy__blue">
                <p class="addcours-card__income-name">Senior -</p>
                <input type="hidden" name="idSenior" value="<?= htmlentities($idSalarySen) ?>">
                <input class="addcours-card__income-inp" name="income-senior" placeholder="доход" value="<?php
                if (getInp('income-senior')) {
                    if (isset($course['name'])) {
                        echo htmlentities($salarySen);
                    }
                } ?>">
            </div>
            <?php getErrors('income-senior'); ?>
        </div>

        <div class="addcours-telegram">
            <h3 class="_700">Ссылка на телеграм <span>канал</span></h3>
            <input class="addcours-telegram__inp _fonBack-navy__blue" type="text" name="telegLink"
                placeholder="@telegram" value="<?php
                if (getInp('telegLink')) {
                    if (isset($course['name'])) {
                        echo htmlentities($course['telegLink']);
                    }
                } ?>">
        </div>
        <?php getErrors('telegLink'); ?>

        <div>
            <?php if (isset($course)) { ?>
                <input class="addcours-btn _btn _border" type="submit" name="updateCours" value="Сохранить" id="btnForm">
            <?php } else { ?>
                <input class="addcours-btn _btn _border" type="submit" name="addCours" value="Добавить" id="btnForm">
            <?php } ?>
        </div>
    </form>
</div>