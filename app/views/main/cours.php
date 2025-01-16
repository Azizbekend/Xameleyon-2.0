<?php
$publicPath = '../public/';

$course = $vars['courses'];
$listTheory = $vars['listTheory'];
$salaryes = $vars['salaryes'];
$profUseres = $vars['profUseres'];


foreach ($salaryes as $salary) {
    if ($salary['name'] == "Junior")
        $salaryJun = $salary['salary'];
    if ($salary['name'] == "Middle")
        $salaryMid = $salary['salary'];
    if ($salary['name'] == "Senior")
        $salarySen = $salary['salary'];
}
?>

<div class="wrapper">
    <!-- banner -->
    <section class="banner">
        <div class="banner__word _content _py">
            <p class="_text-lvl_1"><?= htmlentities($course['name']) ?></p>
            <h1><?= htmlentities($course['slogan']) ?></h1>
            <a class="banner__btn _btn" href="../main/#cours">Начать обучение</a>
            <a class="banner__errow" href="#about">
                <span>V</span>
                <span>V</span>
                <span>V</span>
            </a>
        </div>
        <div class="banner__ellips">
            <div class="banner__ellip"></div>
            <div class="banner__ellip"></div>
        </div>
    </section>

    <section class="_lineSection _content _py"></section>

    <!-- about -->
    <section class="about _py _content" id="about">
        <div class="info-block _fonBack-navy__blue _cours">
            <div class="info-block__word _cours">
                <h3 class="_700"><span><?= htmlentities($course['specialist']) ?></span> - это ...</h3>
                <p class="_text-lvl_1"><?= htmlentities($course['discription']) ?></p>
            </div>
            <img class="info-block__pretzel _adap"
                src="<?= htmlentities($publicPath) ?>/media/icons/rainbow-pretzel.png" alt="rainbow-pretzel">
        </div>
    </section>

    <!-- wages -->
    <section class="wages _content _py">
        <h2 class="wages__title _700">Сколько <span>зарабатывает</span><br> <?= htmlentities($course['specialist']) ?>
        </h2>
        <div class="wages__hh">
            <p>Данные взяты из сервисов по поиску работы <span> <br>Зарплата в месяц. Данные за 2023 год в
                    Узбекистане.</span></p>

            <img src="<?= htmlentities($publicPath) ?>/media/page-cours/hh-logo.png" alt="hh-logo">
        </div>

        <div class="wages__cards">
            <div class="wages__card _fonBack-navy__blue junior">
                <p class="wages__number">$ <?= htmlentities($salaryJun) ?></p>
                <p class="wages__name">Junior</p>
            </div>
            <div class="wages__card _fonBack-navy__blue middle">
                <p class="wages__number">$ <?= htmlentities($salaryMid) ?></p>
                <p class="wages__name">Middle</p>
            </div>
            <div class="wages__card _fonBack-navy__blue senior">
                <p class="wages__number">$ <?= htmlentities($salarySen) ?></p>
                <p class="wages__name">Senior</p>
            </div>
        </div>
    </section>

    <!-- Уроки -->
    <?php if (!empty($listTheory)) { ?>

        <section class="technologies _content _py">
            <h2 class="technologies__title _700">Вас ждут <span><?= count($listTheory) ?></span>
                <?php if (count($listTheory) == 1) {
                    echo "урок";
                } else if (count($listTheory) > 1 && count($listTheory) < 5) {
                    echo "урока";
                } else {
                    echo "уроков";
                }
                ?>
            </h2>
            <div class="technologies__cards">
                <?php $i = 1;
                foreach ($listTheory as $theory) { ?>
                    <div class="technologies__card _fonBack-navy__blue _hover">
                        <p class="_text-lvl_3"><?= $i++ . ". " . htmlentities($theory['name']) ?></p>
                    </div>
                <?php } ?>
        </section>
    <?php } ?>

    <!-- teacher -->
    <section class="teacher _py" id="teacher">
        <h2 class="teacher__title _700"><span>Ваши</span> наставники</h2>
        <div class="teacher__cards">
            <?php foreach ($profUseres as $profUser) { ?>
                <div class="teacher__card teacher-card _fonBack-navy__blue">
                    <div class="teacher-card__img">
                        <img src="<?= htmlentities($publicPath) ?>/media/users/<?= htmlentities($profUser['img']) ?>"
                            alt="teacher">
                    </div>
                    <h4 class="_700"><?= htmlentities($profUser['surname']) ?>     <?= htmlentities($profUser['name']) ?>
                    </h4>
                    <p class="_text-lvl_1">
                        <?= htmlentities($profUser['nameProf']); ?>
                    </p>
                    <img class="teacher-card__work"
                        src="<?= $publicPath ?>/media/teachers/<?= htmlentities($profUser['imgProf']); ?>"
                        alt="teacher-1_work">
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- rate -->
    <section class="rate _content _py">
        <h2 class="rate__title _700">Выберите <span>удобный</span><br> для вас тариф оплаты</h2>
        <div class="rate__cards">
            <div class="rate__card _fonBack-navy__blue">
                <img src="<?= htmlentities($publicPath) ?>/media/page-cours/pay-now.png" alt="pay-now">
                <h3 class="_700">Оплатить сразу</h3>
                <p class="_text-lvl_2">
                    Учеба начнется сразу после покупки<br>
                    Любые методы оплаты<br>
                    Проверка знаний после каждого модуля<br>
                    Онлайн-встречи с менторами
                </p>
                <h3 class="_700"><?= htmlentities(number_format($course['price'], 0, '.', ' ')) ?> so'm</h3>
                <?php if (isset($_SESSION['user'])) { ?>
                    <a href="../profile/courses" class="rate__btn _btn _unbounded _border">Выбрать</a>
                <?php } else { ?>
                    <a href="login" class="rate__btn _btn _unbounded _border">Выбрать</a>
                <?php } ?>
            </div>
            <div class="rate__card _fonBack-navy__blue _green">
                <img src="<?= htmlentities($publicPath) ?>/media/page-cours/pay-manth.png" alt="pay-now">
                <h3 class="_700">Оплата в рассрочку</h3>
                <p class="_text-lvl_2">
                    Всё из тарифа “оплатить сразу”<br>
                    Оплата в рассрочку без дополнительных комиссий.
                </p>
                <h3 class="_700">от <?= htmlentities(number_format(round($course['price'] / 6), 0, '.', ' ')) ?> so'm
                    <br>х6 в месяц
                </h3>
                <?php if (isset($_SESSION['user'])) { ?>
                    <a href="../profile/courses" class="rate__btn _btn _unbounded _border">Выбрать</a>
                <?php } else { ?>
                    <a href="login" class="rate__btn _btn _unbounded _border">Выбрать</a>
                <?php } ?>
            </div>
        </div>
    </section>
</div>