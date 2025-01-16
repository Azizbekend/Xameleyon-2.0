<?php
$publicPath = '../public/';

$course = $vars['courses'];
$listTheory = $vars['listTheory'];
$salaryes = $vars['salaryes'];
$useres = $vars['useres'];
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

<!-- banner -->
<section class="banner">
    <div class="banner__word  _py">
        <p class="_text-lvl_1"><?= htmlentities($course['name']) ?></p>
        <h2><?= htmlentities($course['slogan']) ?></h2>
        <a class="banner__btn _btn" href="#rate">Начать обучение</a>
    </div>
</section>

<!-- about -->
<section class="about _py " id="about">
    <div class="info-block _fonBack-navy__blue _cours">
        <div class="info-block__word _cours">
            <h3 class="_700"><span><?= htmlentities($course['specialist']) ?></span> - это ...</h3>
            <p class="_text-lvl_1"><?= htmlentities($course['discription']) ?></p>
        </div>
    </div>
</section>

<!-- wages -->
<section class="wages  _py">
    <h3 class="wages__title _700">Сколько <span>зарабатывает</span><br> Java developer</h3>

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

<!-- technologies -->
<?php
if (!empty($skillses)) { ?>
    <section class="technologies  _py">
        <h3 class="technologies__title _700"><span>Технологии</span> изучаемые в процессе обучения</h3>

        <div class="technologies__cards">

            <?php foreach ($skillses as $skill) { ?>
                <div class="technologies__card _fonBack-navy__blue _hover">
                    <h6 class="technologies__name _700"><?= htmlentities($skill['name']) ?></h6>
                    <p class="_text-lvl_3"><?= htmlentities($skill['text']) ?></p>
                </div>
            <?php } ?>

            <div class="technologies__card _fonBack-navy__blue _hover">
                <h6 class="technologies__name _700">Spring Boot</h6>
                <p class="_text-lvl_3">Технология для быстрого создания и запуска проектов на основе Spring</p>
            </div>
            <div class="technologies__card _fonBack-navy__blue _hover">
                <h6 class="technologies__name _700">Spring Boot</h6>
                <p class="_text-lvl_3">Технология для быстрого создания и запуска проектов на основе Spring</p>
            </div>
            <div class="technologies__card _fonBack-navy__blue _hover">
                <h6 class="technologies__name _700">Spring Boot</h6>
                <p class="_text-lvl_3">Технология для быстрого создания и запуска проектов на основе Spring</p>
            </div>
            <div class="technologies__card _fonBack-navy__blue _hover">
                <h6 class="technologies__name _700">Spring Boot</h6>
                <p class="_text-lvl_3">Технология для быстрого создания и запуска проектов на основе Spring</p>
            </div>
        </div>
    </section>
<?php } ?>

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

<!-- rate -->
<section class="rate" id="rate">
    <h3 class="rate__title _700">Выберите <span>удобный</span><br> для вас тариф оплаты</h3>
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
            <form action="buy" method="post">
                <input type="hidden" name="idCours" value="<?= htmlentities($course['id']) ?>">
                <input type="hidden" name="rate" value="norm">
                <button class="rate__btn _btn _unbounded _border" name="buy">Выбрать</button>
            </form>
        </div>
        <div class="rate__card _fonBack-navy__blue _green">
            <img src="<?= htmlentities($publicPath) ?>/media/page-cours/pay-manth.png" alt="pay-now">
            <h3 class="_700">Оплата в рассрочку</h3>
            <p class="_text-lvl_2">
                Всё из тарифа “оплатить сразу”<br>
                Оплата в рассрочку без дополнительных комиссий.
            </p>
            <h3 class="_700">от <?= htmlentities(number_format(round($course['price'] / 6), 0, '.', ' ')) ?> so'm <br>х6
                в месяц
                <form action="buy" method="post">
                    <input type="hidden" name="idCours" value="<?= htmlentities($course['id']) ?>">
                    <input type="hidden" name="rate" value="instalplan">
                    <button class="rate__btn _btn _unbounded _border" name="buy">Выбрать</button>
                </form>
        </div>
    </div>
</section>

<div class="userInfo__btns _infoUser">
    <a class="userInfo__btn _btn _notBack" href="courses">Назад</a>
</div>